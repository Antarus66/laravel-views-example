



    <form role="form" method="POST" action="{{ route('item-store') }}">
        {{ csrf_field() }}

        <label for="title" >Model</label>
        <input id="title" type="text" name="title" required autofocus>

        <button type="submit">Save</button>
    </form>