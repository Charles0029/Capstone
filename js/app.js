document.addEventListener("DOMContentLoaded", function (event) {
  const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
      nav = document.getElementById(navId),
      bodypd = document.getElementById(bodyId),
      headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if (toggle && nav && bodypd && headerpd) {
      toggle.addEventListener('click', () => {
        // show navbar
        nav.classList.toggle('showNav')
        // change icon
        toggle.classList.toggle('bx-x')
        // add padding to body
        bodypd.classList.toggle('body-pd')
        // add padding to header
        headerpd.classList.toggle('body-pd')
      });
    };
  };

  showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
  const linkColor = document.querySelectorAll('.nav_link')

  function colorLink() {
    if (linkColor) {
      linkColor.forEach(l => l.classList.remove('active'))
      this.classList.add('active')
    };
  };
  linkColor.forEach(l => l.addEventListener('click', colorLink))
});

// live time
window.onload = displayClock();
function displayClock() {
  var display = new Date().toLocaleTimeString();
  $("#LiveTime").text(display);
  setTimeout(displayClock, 1000);
}

// search live onchange
function search(param) {
  let rowCount = 0;
  let input, filter, table, tr, i;
  let td0, td1, td2, td3, td4, td5, td6, td7;
  let txtVal0, txtVal1, txtVal2, txtVal3, txtVal4, txtVal5, txtVal6, txtVal7;
  let ids = ['#searchSales', '#searchSalesProducts', '#searchSuppliers', '#searchCustomer']
  input = $(ids[param]).val();
  filter = input.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[4];
    if (param == 1) {
      td5 = tr[i].getElementsByTagName("td")[5];
      td6 = tr[i].getElementsByTagName("td")[6];
      td7 = tr[i].getElementsByTagName("td")[7];
    }
    if (param == 0) {
      td5 = tr[i].getElementsByTagName("td")[5];
    }
    if (param == 2 || param == 3) {
      td0 = tr[i].getElementsByTagName("td")[0];
    }
    if (td1 || td2 || td3 || td4 || td5) {
      txtVal0 = '';
      txtVal1 = td1.textContent || td1.innerText;
      txtVal2 = td2.textContent || td2.innerText;
      txtVal3 = td3.textContent || td3.innerText;
      txtVal4 = td4.textContent || td4.innerText;
      txtVal5 = '';
      txtVal6 = '';
      txtVal7 = '';
      if (param == 1) {
        txtVal5 = td5.textContent || td5.innerText;
        txtVal6 = td6.textContent || td6.innerText;
        txtVal7 = td7.textContent || td7.innerText;
      }
      if (param == 0) {
        txtVal5 = td5.textContent || td5.innerText;
      }
      if (param == 2 || param == 3) {
        txtVal0 = td0.textContent || td0.innerText;
      }
      if (txtVal0.toUpperCase().indexOf(filter) > -1 || txtVal1.toUpperCase().indexOf(filter) > -1 || txtVal2.toUpperCase().indexOf(filter) > -1 || txtVal3.toUpperCase().indexOf(filter) > -1 || txtVal4.toUpperCase().indexOf(filter) > -1 || txtVal5.toUpperCase().indexOf(filter) > -1 || txtVal6.toUpperCase().indexOf(filter) > -1 || txtVal7.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        rowCount++;
      } else {
        tr[i].style.display = "none";
      }
    };       
  };
  if (rowCount == 0) {
    $("#no-search").css("display", "block");
  } else {
    $("#no-search").css("display", "none");
    rowCount = 0;
  }
};

// image modal
$(function() {
  $('.pop').on('click', function() {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');   
  });		
});

// SALES
function calculateSales(retail, id) {
  let qty, ta, profit, purchase; 
  qty = parseFloat($('#qty'+id).val());
  purchase = parseFloat($('#purchase'+id).val())
  retail = parseFloat(retail);
  ta = qty*retail;
  $('#ta'+id).val(ta);
  $("#cg"+id).prop('min', ta);

  // calculate profit
  profit = ta - qty*purchase;
  $('#profit'+id).val(Math.abs(profit));

  calculateChangeSales(id);
}

function calculateChangeSales(id) {
  let change, cg, ta;
  ta = $('#ta'+id).val();
  cg = parseFloat($('#cg'+id).val());
  change = cg - ta;
  change = Math.abs(change);
  $('#change'+id).val(change);
}

function clearr(id) {
  $('#change'+id).val("");
  $('#ta'+id).val("");
  $('#qty'+id).val("");
  $('#cg'+id).val("");
  $('#tn'+id).val("");
}

// products
function clearProductsForm() {
  $('#pImg').val("");
  $('#pName').val("");
  $('#pQty').val("");
  $('#pPa').val("");
  $('#pRetail').val("");
}

// supplier
function clearSupplierForm() {
  $('#sName').val("");
  $('#sCp').val("");
  $('#sAddress').val("");
  $('#sCn').val("");
  $('#cNote').val("");
}

function clearSupplierFormUpdate(id) {
  $('#sName'+id).val("");
  $('#sCp'+id).val("");
  $('#sAddress'+id).val("");
  $('#sCn'+id).val("");
  $('#sNote'+id).text("");
}

// customer
function clearCustomerForm() {
  $('#cName').val("");
  $('#cC').val("");
  $('#cAddress').val("");
  $('#cNote').val("");
}