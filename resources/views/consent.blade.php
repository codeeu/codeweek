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
    </style>
</head>
<body>
<div id="consentModal" class="modal">
    <div class="modal-content">
        <div>
            <input type="checkbox" id="consentCheckbox">
            <label for="consentCheckbox" class="consent-text">
                I hereby provide my consent for the transmission of my personal data on the 16th of December, 2024 to the Code4Europe consortium, which will act as the sole data controller as of this date. Additionally, I authorise the future transmission of my personal data in June 2026 to the European Commission or HaDEA, contingent upon the attribution of tasks for the EU Code Week initiative in the 2025 work programme of the Digital Europe Programme.
            </label>
            @if (Auth::user()->hasGivenConsent())
                <p>You gave consent on {{ Auth::user()->consent_given_at->format('Y-m-d H:i:s') }}</p>
            @endif
        </div>
        <div class="modal-footer">
            <button id="consentButton" disabled>Continue</button>
            <button id="logoutButton">Dismiss</button>
        </div>
    </div>
</div>

<form id="consentForm" action="{{ route('consent.store') }}" method="POST" style="display: none;">
    @csrf
</form>
<form id="logoutForm" action="{{ route('consent.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    document.getElementById('consentCheckbox').addEventListener('change', function() {
        document.getElementById('consentButton').disabled = !this.checked;
    });

    document.getElementById('consentButton').addEventListener('click', function() {
        console.log('Consent button clicked');
        document.getElementById('consentForm').submit();
    });

    document.getElementById('logoutButton').addEventListener('click', function() {
        console.log('Logout button clicked');
        document.getElementById('logoutForm').submit();
    });
</script>
</body>
</html>
