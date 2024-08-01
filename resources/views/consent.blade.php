<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .modal {
            display: block;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 500px;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .modal-footer button {
            padding: 10px 20px;
        }
        #consentButton {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #consentButton:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        #logoutButton {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .consent-text {
            padding: 10px 0;
        }
        .consent-text.disabled {
            color: #cccccc;
        }
    </style>
</head>
<body>
<div id="consentModal" class="modal">
    <div class="modal-content">
        <div>
            <input type="checkbox" id="consentCheckbox1">
            <label for="consentCheckbox1" class="consent-text">
                I hereby consent to the transmission of my personal data on the 16th of December, 2024 to the Code4Europe consortium, which will be sole responsible for this initiative as of this date.
                <br><br>
                Please note that not consenting to this transmission will result in the complete deletion of all your personal data (including registered activities, badges, certificates, etc.) on December 15th, 2024.
                @if (Auth::user()->hasGivenConsent())
                    <p>You already gave your consent on {{ Auth::user()->consent_given_at->format('Y-m-d H:i:s') }}</p>
                @endif
            </label>

        </div>
        <div style="margin-top:20px">
            <input type="checkbox" id="consentCheckbox2" disabled>
            <label for="consentCheckbox2" id="consentText2" class="consent-text disabled">
                I hereby consent to the future transmission of my personal data in June 2026 to the European Commission or HaDEA, contingent upon the attribution of tasks for the EU Code Week initiative in the 2025 work programme of the Digital Europe Programme.
                <br><br>
                Please note that not consenting to this transmission will result in the complete deletion of all your personal data (including registered activities, badges, certificates, etc.) in June 2026.
                <br/>@if (Auth::user()->hasGivenFutureConsent())
                    <p>You already gave your consent on {{ Auth::user()->future_consent_given_at->format('Y-m-d H:i:s') }}</p>
                @endif
            </label>

        </div>
        <div class="modal-footer">
            <button id="consentButton" disabled>Continue</button>
            <button id="logoutButton">Dismiss</button>
        </div>
    </div>
</div>

<form id="consentForm" action="{{ route('consent.store') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="consent1" id="consent1Input">
    <input type="hidden" name="consent2" id="consent2Input">
</form>
<form id="logoutForm" action="{{ route('consent.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    document.getElementById('consentCheckbox1').addEventListener('change', function() {
        const isChecked = this.checked;
        document.getElementById('consentCheckbox2').disabled = !isChecked;
        document.getElementById('consentButton').disabled = !isChecked;
        document.getElementById('consent1Input').value = isChecked ? '1' : '0';
        document.getElementById('consentText2').classList.toggle('disabled', !isChecked);
    });

    document.getElementById('consentCheckbox2').addEventListener('change', function() {
        const isChecked = this.checked;
        document.getElementById('consent2Input').value = isChecked ? '1' : '0';
    });

    document.getElementById('consentButton').addEventListener('click', function() {
        document.getElementById('consentForm').submit();
    });

    document.getElementById('logoutButton').addEventListener('click', function() {
        document.getElementById('logoutForm').submit();
    });
</script>
</body>
</html>
