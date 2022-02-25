

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oracle</title>
</head>
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<body>
<div class="container mt-5">
    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Hospital No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
               
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

</body>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">

    
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data.list') }}",
        

        columns: [
            {list: 'pama_patientid', name: 'pama_patientid'},
            {list: 'pama_fname', name: 'pama_fname'},
            {list: 'pama_lname', name: 'pama_lname'},
            {list: 'pama_age', name: 'pama_age'},
          
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });

</script>
</html>
