<div class="mb-3">
    <label>Title</label>

    <input type="text" name="title" class="form-control" value="{{ old('title', $webinar->title ?? '') }}">
</div>

<div class="mb-3">
    <label>Webinar Date</label>

    <input type="date" name="webinar_date" class="form-control"
        value="{{ old('webinar_date', isset($webinar) ? $webinar->webinar_date->format('Y-m-d') : '') }}">
</div>

<div class="mb-3">
    <label>Access Days</label>

    <input type="number" name="access_duration_days" class="form-control"
        value="{{ old('access_duration_days', $webinar->access_duration_days ?? 30) }}">
</div>
