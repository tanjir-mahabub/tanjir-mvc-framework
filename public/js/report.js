$(function() {    

    $('input[name="date_range"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
     
      let startDate = start.format('MM-DD-YYYY');
      let endDate = end.format('MM-DD-YYYY');
      let tr = $("#table tr");
      let td = $("#table td:last-child()");
        
        let D_1 = startDate.split("-");
        let D_2 = endDate.split("-");
        
        let D_3, d3;
        let d1 = new Date(D_1[2], D_1[0]-1, D_1[1]);
        let d2 = new Date(D_2[2], D_2[0]-1, D_2[1]);

        tr.addClass("d-none");
        
        td.each(function() {
          D_3 = $(this).text().split("-");
          d3 = new Date(D_3[2], D_3[0]-1, D_3[1]);
          if (d3 >= d1 && d3 <= d2) {            
            $(this).parent(tr).removeClass("d-none");
            //console.log("Our Date is between date 1 and date 2");
          } else {
            $(tr[0]).removeClass("d-none");
            $(this).parent(tr).addClass("d-none");
            //console.log("Sorry not exists");
          }
        })

        
    });

    
    // search by user id
    $("#filterById").on("keyup", function() {
      let value = $(this).val(); 
      let tr = $("#table tr");
      let th = $("#table th[scope='row']");
      
        tr.addClass("d-none");
        th.each(function() {
          let test = $(this).text();
          if(value == test) {
            // console.log(true);
            $(tr[0]).removeClass("d-none");
            $(this).parent(tr).removeClass("d-none");
          } else {
            $(tr[0]).removeClass("d-none");
          }
          if(!value) {
            $(tr[0]).removeClass("d-none");
            $(this).parent(tr).removeClass("d-none");
          }
        });

      });


  });