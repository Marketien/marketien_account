@extends('adminMaster')
@section('content')
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-l0sNRNKZ.js') }}">
    <script type="module" src="{{ asset('build/assets/app-ZYuboFVO.js') }}"></script> --}}
    <style>
        .parentBody {
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 70px;
            left: 20px;
            width: 25px;
            height: 25px;
            background-color: rgb(176, 176, 176);
            padding: 5px;
            border-radius: 50%
        }


        .back-button:hover {
            background-color: rgb(75, 74, 74);
        }

        .add-button {
            display: flex;
            justify-content: center;
            border-radius: 5px;
            color: white;
            padding: 0px 20px;

            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 1px 1px rgba(2, 2, 2, 0.764);
            text-transform: uppercase;
        }

        .delete-button {
            display: flex;
            justify-content: center;
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            background: #ff0000 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 1px 1px rgba(2, 2, 2, 0.764);
            text-transform: uppercase;
        }

        .submit-button {
            /* margin-top: -50px; */
            display: block;
            width: 100%;
            padding: 10px;

            background: #213167;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background: #21a1eb;
        }

        form {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: rgb(223, 220, 220);
        }

        .quotation-container {
            margin-top: 60px;
            margin-bottom: 20px;
            font-family: "Montserrat", sans-serif;
            background-color: white;
            padding: 20px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        .invoice-box1 {
            margin: 0px 60px 0px 60px
        }

        .form-group {
            margin: 10px 0px 10px 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group>div {
            flex: 1;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .form-group-textarea {
            display: flex !important;
            gap: 10px;
        }

        label {
            background-color: #f1f1f1 !important;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-left: 1px solid #d1cdcd;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            /* width: 20% !important; */
            padding: 11px 15px 10px 15px;
        }

        .label-1 {
            background-color: #f1f1f1 !important;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-left: 1px solid #d1cdcd;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            width: 20% !important;
            padding: 11px 15px 10px 15px;
        }

        .formInput {
            /* width: 66%; */
            padding: 9px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-1 {
            width: 80%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-2 {
            width: 56%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-3 {
            width: 79%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-4 {
            width: 70%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-5 {
            width: 81%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-6 {
            width: 65%;
            padding: 9px 0px 9px 0px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .formInput-7 {
            width: 75%;
            padding: 9px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

        }

        .invoice-section2 {
            margin-right: 10px;
        }

        .invoice-table input {
            width: 90%;
            padding: 8px;
            /* border: none; */
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th {
            text-transform: uppercase;
            font-weight: 400;
            padding: 8px;
            text-align: center;
            background: #21a1eb;
            color: white;
        }

        .invoice-table td {
            margin-bottom: 20px;
            border: 1px solid #d1cdcd;
            text-align: left;
        }

        .form-group-1 {
            visibility: hidden;
            width: 50%;
            margin-bottom: 20px;
        }

        .form-group-2 {
            visibility: visible;
            width: 50%;
            margin-bottom: 80px;
        }

        .amount-section-div {
            display: flex;
            justify-content: space-between;
            margin-bottom: -50px;
        }

        .label-2 {
            background-color: #21a1eb !important;
            color: white !important;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-left: 1px solid #d1cdcd;
            font-size: 12px;
            font-weight: 600;

            text-align: center;
            width: 39% !important;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .label-3 {
            width: 100% !important;
            background-color: #213167 !important;
            color: white !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: none;
            border-right: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);

            font-size: 14px;
            font-weight: 600;
            text-align: center;
            /* padding: 9px 6px 7px 6px; */
            padding: 9px 118px 7px 116px;
        }

        .label-4 {
            width: 100% !important;
            background-color: #213167 !important;
            color: white !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: none;
            border-right: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);

            font-size: 14px;
            font-weight: 600;
            text-align: center;
            /* padding: 9px 6px 7px 6px; */
            padding: 9px 126px 7px 125px;
        }

        .formInput-8 {
            width: 59%;
            padding: 6px 0px 7px 12px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

            margin-bottom: 10px;
        }

        .formInput-9 {
            width: 59%;
            padding: 6px 0px 7px 12px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

            margin-bottom: 10px;
        }

        .formInput-10,
        .formInput-11 {
            width: 59%;
            padding: 6px 0px 7px 12px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

            margin-bottom: 10px;
        }

        .formInput-12 {
            width: 59%;
            padding: 4px 0px 6px 12px;
            font-size: 16px;
            border-top: 1px solid #d1cdcd;
            border-bottom: 1px solid #d1cdcd;
            border-right: 1px solid #d1cdcd;
            border-left: none;

            margin-bottom: 10px;
        }

        .formInput-13 {
            border-top: none;
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            width: 100%;
            box-sizing: border-box;
            font-size: 14px;
            height: 150px;
            /* margin-top: 6px; */

        }

        .childInput {
            margin-left: 40px;
            padding: 5px;
            width: 230px;
        }

        .heading {
            font-weight: 700;
        }

        .formIn {
            width: 90%;
            box-sizing: border-box;
            font-size: 14px;
            height: 95px;
            margin-top: 6px;
        }


        /* Media Query for Medium  device  */
        @media (min-width: 577px) and (max-width: 768px) {
            .formInput {
                width: 65%;
                padding-top: 11px;
            }

            .invoice-box1 {
                margin: 0px;
            }

            .formInput-8 {
                width: 60%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-9 {
                width: 57%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-10,
            .formInput-11 {
                width: 75%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-12 {
                width: 52%;
                padding: 9px 0px 9px 0px;
            }

            .label-3 {
                padding: 9px 109px 7px 108px;
            }

            .label-4 {
                padding: 9px 117px 7px 117px;
            }
        }

        /* Media Query for Small device  */
        @media screen and (max-width: 576px) {
            .form-group {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: center;
            }

            .invoice-box1 {
                margin: 0px;
            }

            label {
                background-color: #f1f1f1 !important;
                border-top: 1px solid #d1cdcd;
                border-bottom: 1px solid #d1cdcd;
                border-left: 1px solid #d1cdcd;
                font-size: 14px;
                font-weight: 700;
                text-align: center;
                width: 20% !important;
                padding: 11px 15px 10px 15px;
            }

            .label-1 {
                background-color: #f1f1f1 !important;
                border-top: 1px solid #d1cdcd;
                border-bottom: 1px solid #d1cdcd;
                border-left: 1px solid #d1cdcd;
                font-size: 14px;
                font-weight: 700;
                text-align: center;
                width: 20% !important;
                padding: 11px 15px 10px 15px;
            }

            .formInput {
                width: 65%;
                padding-top: 11px;
            }

            .formInput-1 {
                width: 76%;
            }

            .formInput-2 {
                width: 55%;
                padding: 11px 0px 10px 0px;
            }

            .formInput-3 {
                width: 79%;
                padding: 11px 0px 10px 0px;
            }

            .formInput-4 {
                width: 69%;
                padding: 11px 0px 10px 0px;
            }

            .formInput-5 {
                width: 81%;
                padding: 11px 0px 10px 0px;
            }

            .formInput-6 {

                width: 65%;
                padding: 11px 0px 10px 0px;
            }

            .formInput-7 {
                width: 68%;
                padding-top: 11px;
            }

            .invoice-section2,
            .invoice-table {
                overflow: auto !important;
            }

            .form-group-1 {
                visibility: hidden;
                width: 0%;
                margin-bottom: -60px;
            }

            .form-group-2 {
                visibility: visible;
                width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .formInput-8 {
                width: 59%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-9 {
                width: 56%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-10 {
                width: 76%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-11 {
                width: 75%;
                padding: 9px 0px 9px 0px;
            }

            .formInput-12 {
                width: 51%;
                padding: 9px 0px 9px 0px;
            }


            .form-group-textarea {
                display: grid !important;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: center;
            }

            .label-3 {
                padding: 9px 99px 7px 100px;
            }

            .label-4 {
                padding: 9px 106px 7px 110px;
            }

            .formInput-13 {
                width: 100%;
            }


        }
    </style>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <div class="parentBody">
        <div id="appq" class="flex-grow-1 main-content-expanded p-3 ">

        </div>
        <img class="back-button" title="back-button" onclick="window.history.back();"
            src="{{ asset('image/left-arrow.png') }}" alt="">
    </div>

    <!-- Bullet point script  -->
    <script>
        const textarea1 = document.getElementById('myTextArea1');
        const textarea2 = document.getElementById('myTextArea2');

        textarea1.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                const value = this.value;
                const lines = value.split('\n');
                const currentLineIndex = getCurrentLineIndex(this);
                const currentLine = lines[currentLineIndex];

                if (isBulletPoint(currentLine)) {
                    // Remove bullet point if current line starts with '- '
                    lines[currentLineIndex] = currentLine.slice(2); // Remove '- '
                } else {
                    // Insert bullet point if current line doesn't start with '- '
                    lines.splice(currentLineIndex, 0, '• ');
                }

                this.value = lines.join('\n');
                this.selectionStart = this.selectionEnd = getNewCursorPosition(currentLineIndex, currentLine,
                    isBulletPoint(currentLine));
            }
        });

        function getCurrentLineIndex(textarea1) {
            return textarea1.value.substr(0, textarea1.selectionStart).split('\n').length - 1;
        }

        function isBulletPoint(line) {
            return /^ /.test(line.trim());
        }

        function getNewCursorPosition(currentLineIndex, currentLine, isBullet) {
            if (isBullet) {
                // If there was a bullet point, move cursor to beginning of the line
                return currentLineIndex * 2; // Assuming '- ' is 2 characters long
            } else {
                // If there was no bullet point, move cursor to after the inserted bullet point
                return (currentLineIndex + 1) * 2; // Assuming '- ' is 2 characters long
            }
        }
        // ------------------------------------------------------------------------------------------------------------
        textarea2.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                const value = this.value;
                const lines = value.split('\n');
                const currentLineIndex = getCurrentLineIndex(this);
                const currentLine = lines[currentLineIndex];

                if (isBulletPoint(currentLine)) {
                    // Remove bullet point if current line starts with '- '
                    lines[currentLineIndex] = currentLine.slice(2); // Remove '- '
                } else {
                    // Insert bullet point if current line doesn't start with '- '
                    lines.splice(currentLineIndex, 0, '• ');
                }

                this.value = lines.join('\n');
                this.selectionStart = this.selectionEnd = getNewCursorPosition(currentLineIndex, currentLine,
                    isBulletPoint(currentLine));
            }
        });

        function getCurrentLineIndex(textarea2) {
            return textarea2.value.substr(0, textarea2.selectionStart).split('\n').length - 1;
        }

        function isBulletPoint(line) {
            return /^ /.test(line.trim());
        }

        function getNewCursorPosition(currentLineIndex, currentLine, isBullet) {
            if (isBullet) {
                // If there was a bullet point, move cursor to beginning of the line
                return currentLineIndex * 2; // Assuming '- ' is 2 characters long
            } else {
                // If there was no bullet point, move cursor to after the inserted bullet point
                return (currentLineIndex + 1) * 2; // Assuming '- ' is 2 characters long
            }
        }
    </script>
@endsection
