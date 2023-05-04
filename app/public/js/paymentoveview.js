const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const table = document.getElementById("table");
const headers = table.querySelectorAll("thead th");
const rows = table.querySelectorAll("tbody tr");
const download = document.getElementById("download");
download.addEventListener("click", () => {
    send(selected);
});


var selected = [];
function CheckboxListener() {
  selected = [];
  checkboxes.forEach((checkbox) => {
    switch (checkbox.id) {
      case "idOption":
        toggleCheckbox(checkbox);
        break;
      case "WhenOption":
        toggleCheckbox(checkbox);

        break;

      case "WhereOption":
        toggleCheckbox(checkbox);

        break;
      case "WhenOption":
        toggleCheckbox(checkbox);

        break;
      case "WhatOption":
        toggleCheckbox(checkbox);

        break;
      case "TotalOption":
        toggleCheckbox(checkbox);

        break;
      case "VatOption":
        toggleCheckbox(checkbox);

        break;
      default:
        console.log(`Unknown checkbox with ID: ${checkbox.id}`);
    }
  });
  selectRow(rows);
  SetdownloadButtonState();
  console.log(selected);
}
function toggleCheckbox(checkbox) {
  if (checkbox.checked) {
    console.log("Checkbox is checked..");
    if (!selected.includes(checkbox.id)) {
      selected.push(checkbox.id);
      checkbox.parentElement.style.backgroundColor = "var(--primary-a)";

    }
  } else {
    checkbox.parentElement.style.backgroundColor = "var(--primary-b)";
  }
}

function SetdownloadButtonState(){
    if(selected.length > 0){
    download.classList.remove("d-none");
    }else{
        download.classList.add("d-none");
    }
}


function selectRow(rows) {
  rows.forEach((row) => {
    var columns = row.querySelectorAll("td");
    for (i = 0; i < columns.length; i++) {
      if (selected.includes(checkboxes[i].id)) {
        columns[i].style.backgroundColor = "var(--primary-a)";
      } else {
        columns[i].style.backgroundColor = "var(--primary-b)";
      }
    }
  });
}

async function send(rows) {
    var url= "";
    rows.forEach((row) => {
        switch (row) {
        case "idOption":
            url += "id,";
            break;
        case "WhenOption":
            url += "date,";
            break;
        case "WhereOption":
            url += "location,";
            break;
        case "WhenOption":
            url += "date,"; 
            break;
        case "WhatOption":
            url += "product,";
            break;
        case "TotalOption":
            url += "total,";
            break;
        case "VatOption":
            url += "vat,";
            break;
        default:
            console.log(`Unknown column: ${checkbox}`);
            break;
        }
    });
    url =  url.slice(0, -1);
    const response = await fetch( `/download/orders?columns=${url}`);
    const result = await response.blob();
    var date = new Date();
 

    const objectURL = URL.createObjectURL(result);
            window.location.replace(objectURL);
        
    //document.body.createElement("iframe").src="data:application/pdf;base64," + result;
}
