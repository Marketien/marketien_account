@extends('adminMaster')
@section('content')
@vite(['resources/js/app.js','resources/css/app.css'])
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-box1 {
            /* max-width: 800px; */
            margin: auto;
            margin-top: 60px;
            padding: 20px;
            border: 1px solid #eee;
            background-color: #f3f1f1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            line-height: 24px;
            color: #555;
        }

        .invoice-box2 {
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            background-color: #f3f1f1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            line-height: 24px;
            color: #555;
        }

        .parentInput {
            margin-left: 15px;
            padding: 5px;
            width: 230px;
        }

        .childInput {
            margin-left: 40px;
            padding: 5px;
            width: 230px;
        }

        textarea {
            width: 100%;
            height: 100px;
        }

        .textarea3 {
            width: 50%;
            height: 150px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-section div {
            display: inline-block;
        }

        .heading {
            font-weight: 700;
        }

        .content {
            margin-top: 20px;
        }
        .submit-button {
        margin-top: -50px;
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
    /* alignment of input field */

        .parentInput1{
            margin-left: 58px;
            padding: 5px;
            width: 230px;
        }
        .parentInput2{
            margin-left: 73px;
            padding: 5px;
            width: 230px;
        }
        .parentInput3{
            margin-left: 78px;
            padding: 5px;
            width: 230px;
        }
        .parentInput4{
            margin-left: 51px;
            padding: 5px;
            width: 230px;
        }
        .parentInput5{
            margin-left: 85px;
            padding: 5px;
            width: 230px;
        }
        .parentInput6{
            margin-left: 67px;
            padding: 5px;
            width: 230px;
        }
        .parentInput7{
            margin-left: 42px;
            padding: 5px;
            width: 230px;
        }
        .parentInput8{
            margin-left: 15px;
            padding: 5px;
            width: 230px;
        }
    </style>
    <div id="appq" class="flex-grow-1 main-content-expanded p-3">

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
