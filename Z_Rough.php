<!DOCTYPE html>
<html>
<head>
  <title>jQuery Table Search Example</title>
  <!-- Include DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
  // Initialize DataTables with search functionality
  $('#dataTable').DataTable();

  // Add a custom search input
  $('#searchInput').on('keyup', function() {
    $('#dataTable').DataTable().search($(this).val()).draw();
  });
});

  </script>
</head>
<body>
  <h1>Table Search Example</h1>
  <input type="text" id="searchInput" placeholder="Search...">
  <table id="dataTable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Doe</td>
        <td>30</td>
        <td>New York</td>
      </tr>
      <tr>
        <td>Jane Smith</td>
        <td>25</td>
        <td>Los Angeles</td>
      </tr>
      <tr>
        <td>Michael Johnson</td>
        <td>35</td>
        <td>Chicago</td>
      </tr>
      <tr>
        <td>Emily Davis</td>
        <td>28</td>
        <td>Miami</td>
      </tr>
    </tbody>
  </table>

  <script src="table_search.js"></script>
</body>
</html>
