<!DOCTYPE html>
<html>
<head>
    <title>Payment Failure</title>
</head>
<body>
    <h1>Payment Failed</h1>
    <p>Sorry, your payment could not be processed. Please try again later.</p>
    @if(session('error'))
        <p>Error message: {{ session('error') }}</p>
    @endif
</body>
</html>
