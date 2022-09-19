<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h2 class="text-center">Create Employee</h2>
    <form class="container" method="post" action="">
        @csrf

           <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Divisions</label>
                <select name="Divisions" id="Division" class="form-control">
                <option value="">Select</option>
                    @foreach($divisions as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach

                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Districts</label>
                <select name="Districts" id="District" class="form-control">
                    <option value="">Select</option>
                   
                </select>
            </div>
            
            <div class="form-group">
               <button id="submitbtn" class="btn btn-primary">Save</button>
            </div>
    </form>

<script>
    $(document).ready(function(){
    
    $("#Division").change(function(){
        $('#District').empty();
        var division = $(this).val();
        
        $.ajax({
            url: "http://127.0.0.1:8000/api/get-districts/"+division,
            type: 'GET',
            dataType: 'json', 
            success: function(response) {
            var districts = response.districts; 
            var str = '' ;
            for ( var i = 0 ; i < districts.length ; i++ ){
                str += '<option value="'+ districts[i].id+'">'+districts[i].name+'</option>';
            }

            $('#District').append(str);

            }
        });
    });

     
     $('#submitbtn').click(function(){

        $.ajax({
            type: "POST",
            dataType: 'json' , 
            url: "http://127.0.0.1:8000/api/store-employee",
            data: {
                name : $('#name').val(),
                division : $('#Division').val(),
                district : $('#District').val()
            },
         
            success: function(data){
            console.log(data);
       }
    });

  });
});
       
        
    </script>
    
</body>
</html>