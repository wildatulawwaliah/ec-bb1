$(document).ready(function() {
 $('.dtable').DataTable({
      "order": [],
      "columnDefs": [
      {
          "targets": [ 0 ],
          "orderable": false,
      },
      ],

  });
});
