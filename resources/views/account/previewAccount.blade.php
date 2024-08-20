<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview</title>

<style>
.htmlBody {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.invoice-box {
  width: 21cm;
  height: 29.7cm;
  margin: 0; /* Remove fixed margins */
  font-family: "Open Sans", sans-serif;
  background-color: #ffffff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  position: relative;
}
     .headerImg {
       width: 150px;
     }
     .invoice-header {
       text-align: center;
       margin-bottom: 10px;
     }

     .invoice-header h1 {
       font-size: 24px;
       margin: 10px 0;
       color: #004c6d;
     }
     .mx-div {
       margin-left: 40px;
       margin-right: 40px;
     }
     .invoice-table {
       width: 100%;
       border-collapse: collapse;
       margin-top: 10px;
     }

     .invoice-table th,
     .invoice-table td {
       border: 1px solid #ddd;
       padding: 8px;
       text-align: left;
       font-size: 14px;
     }

     .invoice-table th {
       background-color: #004c6d;
       color: white;
       font-weight: bold;
     }

     .invoice-table tbody tr:nth-child(even) {
       background-color: #f9f9f9;
     }

     .invoice-summary {
       text-align: right;
       margin-top: 20px;
     }

     .invoice-summary p {
       margin: 5px 0;
     }

     .invoice-summary p.total {
       font-weight: bold;
       color: #004c6d;
     }

     .invoice-footer {
       text-align: center;
       color: #777;
       margin-top: 30px;
     }
     .informationDiv {
         width: 100%;
         display: flex;
         justify-content: space-between;
         gap: 10px;
         font-size: 14px;
     }
     .information1 {
         width: 50%;
     }
     .information2 {
         width: 50%;
     }
     .boldSpan {
         font-weight: bold;
         margin-right: 5px;
     }
     .extraParagraph {
        font-weight: 500;
        text-align: center;
        position: absolute;
        bottom: 30px;
        left: 0;
        width: 100%;
        padding: 0 20px;
        box-sizing: border-box;
     }
     .submit-button {
            display: block;
            width: 100%;
            padding: 10px;
            background: linear-gradient(to top, #3bb890, #114070);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background: linear-gradient(to bottom, #3bb890, #114070);
        }
</style>
</head>
<body>

<div class="htmlBody">
      <div class="invoice-box" id="container_content">
        <!-- header img section  -->

        <div class="mx-div">
            <img class="headerImg" src="image/Qalaat Al Khaleej.png" alt="" />

                  <!-- information section  -->
                  <div class="informationDiv">
                    <div class="information1">
                        <p>
                            <span class="boldSpan">Account Number: </span>
                            <span>110121</span>
                        </p>
                        <p>
                            <span class="boldSpan">Account Title: </span>
                            <span>Abcde</span>
                        </p>
                        <p>
                            <span class="boldSpan">Account Type: </span>
                            <span>Mr. Jamie McMaster</span>
                        </p>
                        <p>
                            <span class="boldSpan">Currency: </span>
                            <span>Boys Changing Room</span>
                        </p>
                        <p>
                            <span class="boldSpan">Date of Opening:</span>
                            <span>10059856233685452</span>
                        </p>
                        <p>
                            <span class="boldSpan">CUstomer Code: </span>
                            <span>Sila</span>
                        </p>
                        <p>
                            <span class="boldSpan">Adress: </span>
                            <span>24th Floor, Al Sila Tower 1, Abu-Dhabi Global Market Square, U.A.E</span>
                        </p>
                        <p>
                            <span class="boldSpan">Tran. Description: </span>
                            <span>Not Available</span>
                        </p>
                    </div>
                    <!-- <div class="information2">
                        <p>
                            <span class="boldSpan">Terms of payment: </span>
                            <span>CDC</span>
                        </p>
                        <p>
                            <span class="boldSpan">Email: </span>
                            <span>info@qalatalkhaleej.com</span>
                        </p>
                        <p>
                            <span class="boldSpan">Ref:</span>
                            <span>PO-111238</span>
                        </p>
                        <p>
                            <span class="boldSpan">TRN:</span>
                            <span>10059856233685452</span>
                        </p>
                        <p>
                            <span class="boldSpan">Scope of Works: </span>
                            <span>carry out carpentry works and replace all 50 locks on lockers in girls changing rooms</span>
                        </p>
                    </div> -->
                  </div>

          <!-- Table section -->
          <table class="invoice-table">
            <tr class="heading">
              <th>Sl No</th>
              <th>Date</th>
              <th>Description</th>
              <th>Debit Amount</th>
              <th>Creadit Amount</th>
              <th>Balanced Amount</th>
            </tr>
            @foreach ($accounts as $account )


            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$account->date}} </td>
              <td>{{$account->description}}</td>
              <td>{{$account->cash_out_debit}}</td>
              <td>{{ $account->cash_in_credit }}</td>
              <td>{{ $account->calc_amount }}</td>

            </tr>
            @endforeach

          </table>
          <div class="extraParagraph">
              <p>
                 Thanks for banking with us
             <br>
                 Plase notify your branch for any discrepcies or irregularities, with 15 days from the date of the statement is correct .This  computer generated statement required no signature.
              </p>
          </div>
        </div>
      </div>
    </div>
    <div class="invoice-footer">
        <input type="button" id="rep" value="Make PDF" class="submit-button btn_print">
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function($) {

        $(document).on('click', '.btn_print', function(event) {
            event.preventDefault();

            //credit : https://ekoopmans.github.io/html2pdf.js

            var element = document.getElementById('container_content');

            //easy
            // html2pdf().from(element).save();

            //custom file name
            html2pdf().set({
                filename: 'account-preview' + '_Qalat-al-khaleej' + '.pdf'
            }).from(element).save();


            //more custom settings
            // var opt = {
            //     margin: 1,
            //     filename: 'pageContent_' + js.AutoCode() + '.pdf',
            //     image: {
            //         type: 'jpeg',
            //         quality: 0.98
            //     },
            //     html2canvas: {
            //         scale: 2
            //     },
            //     jsPDF: {
            //         unit: 'in',
            //         format: 'letter',
            //         orientation: 'portrait'
            //     }
            // };

            // New Promise-based usage:
            // html2pdf().set(opt).from(element).save();


        });



    });
</script>
</html>
