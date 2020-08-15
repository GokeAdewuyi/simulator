<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GP Simulator</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/app.css ')}}">

    <!-- Styles -->
    <style>
        table {
            width: 100%;
        }

        table, th, td {
            border-collapse: collapse; padding: 2px 3px; text-align: center;
        }

    </style>
</head>

<body onload="createTable()">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Grades</div>
                    <div class="card-body">
                        <li>A  - 4.0</li>
                        <li>AB - 3.5</li>
                        <li>B  - 3.25</li>
                        <li>BC - 3.0</li>
                        <li>C -  2.75</li>
                        <li>CD - 2.5</li>
                        <li>D  - 2.25</li>
                        <li>E  - 2.0</li>
                        <li>F  - 0</li>
                        <p></p>
                        <p class="text-danger">*All grades should be written in block letters</p>
                        <p>TNUP - Total Number of Unit Points</p>
                        <p>TNU - Total Number of Unit</p>
                        <p>GP - Grade Point</p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card p-3">
                    <div class="card-header">
                        <h4>GP SIMULATOR</h4>
                    </div>
                    <div class="card-body">
                        <p><input type="button" class="btn btn-success float-right mb-2" id="addRow" value="Add Course" onclick="addRow()"/></p>
                        <div class="table" id="cont"></div>
                    </div>
                    <div class="card-footer text-center">
                        <p><input type="button" class="btn btn-primary btn-submit" id="bt" value="Simulate" onclick="submit()" /></p>
                    </div>
                    <div class="row mt-3">
                        <div class="col"><p><strong>TNUP: </strong><span id="tnup"></span></p></div>
                        <div class="col"><p><strong>TNU: </strong><span id="tnu"></span></p></div>
                        <div class="col"><p><strong>GP: </strong><span id="gp"></span></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    var arrHead = [];
    arrHead = ['Course', 'No. of unit', 'Grade', '']; // table headers.

    // first create a TABLE structure by adding few headers.
    function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');  // table id.

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th'); // the header object.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // add table to a container.
    }

    // function to add new row.
    function addRow() {
        var empTab = document.getElementById('empTable');

        var rowCnt = empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c === 3) {   // if its the last column of the table.
                // add a button control.
                var button = document.createElement('input');

                // set the attributes.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
                button.setAttribute('class', 'btn btn-danger');

                // add button's "onclick" event.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);
            }
            else {
                // the 2nd, 3rd and 4th column, will have textbox.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');

                td.appendChild(ele);
            }
        }
    }

    // function to delete a row.
    function removeRow(oButton) {
        var empTab = document.getElementById('empTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
    }

    // function to extract and submit table data.
    function submit() {
        var myTab = document.getElementById('empTable');
        var grades = [];
        var unit = [];
        var total = [];

        // loop through each row of the table.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            // loop through each cell in a row.
            for (c = 1; c < myTab.rows[row].cells.length; c++) {
                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') === 'text') {
                    grades.push(element.childNodes[0].value);
                }
            }
        }

        for (i = 0; i < grades.length; i++) {
            if (grades[i+1] === 'A') {
                grades[i+1] = 4.0;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'AB') {
                grades[i+1] = 3.5;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'B') {
                grades[i+1] = 3.25;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'BC') {
                grades[i+1] = 3.0;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'C') {
                grades[i+1] = 2.75;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'CD') {
                grades[i+1] = 2.5;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'D') {
                grades[i+1] = 2.25;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'E') {
                grades[i+1] = 2.0;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
            if (grades[i+1] === 'F') {
                grades[i+1] = 0;
                total.push(grades[i]*grades[i+1]);
                unit.push(Number(grades[i]));
            }
        }

        var tnup = total.reduce((a, b) => a + b , 0);
        var tnu = unit.reduce((a, b) => a + b, 0);

        var GPA = tnup/tnu;
        var GP = GPA.toFixed(2);

        document.getElementById('tnup').innerText = tnup;
        document.getElementById('tnu').innerText = tnu;
        document.getElementById('gp').innerText = GP;

    }
</script>
</html>
