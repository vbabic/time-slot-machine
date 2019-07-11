<h3>New SLOTS</h3>

<form action="{{route('slot.store')}}" method="POST">
    START
    <input type="text" name="start_date">
    <input type="text" name="start_time">
    <br>END
    <input type="text" name="end_date">
    <input type="text" name="end_time">
    @csrf
    <br>
    <br>
    <button type="submit">TAIP</button>
</form>