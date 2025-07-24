<!DOCTYPE html>
<html>
<body>
    <form action="/pay" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
