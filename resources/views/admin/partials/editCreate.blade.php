<div class="p-5">
    @if ($errors->any())
        <div class="error-wrapper">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<form action="{{ route($routeAddress, $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <h4 class="fw-bold">
        Autore: {{ Auth::user()->name }}
    </h4>


    <div class="mb-3">
        <label for="post_type" class="form-label">Type</label>

        <select type="text" class="form-control" id="title" name="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id', $post->type_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control" id="title" placeholder="the lord of kings" name="title"
            value="{{ old('title', $post->title) }}">
    </div>


    <div class="mb-3">
        <label for="date" class="form-label">data</label>
        <input type="datetime" class="form-control" id="date" rows="15" name="date"
            value="{{ old('date', $post->date) }}">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Example textarea</label>
        <textarea class="form-control" id="content" rows="15" name="content">{{ old('content', $post->content) }}</textarea>
    </div>


    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image"
            value="{{ old('image', $post->image) }}">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-info">
            {{ $routeAddress == 'admin.posts.update' ? 'Update film' : 'create a new film' }}
        </button>
    </div>
</form>

<div>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
</div>

</div>
