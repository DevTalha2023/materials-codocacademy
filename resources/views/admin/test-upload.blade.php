<form method="POST" action="{{ route('materials.store', 1) }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title">

    <input type="file" name="file">

    <button type="submit">
        Upload
    </button>
</form>
