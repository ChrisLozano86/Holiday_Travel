
$(document).ready(function() {
    $('#table-data').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });

    $('#table-data-reservations').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      "order": [[ 0, "desc" ]] 
    });

    $('#table-data-travel-agencies').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      "order": [[ 0, "desc" ]]
    });

  });