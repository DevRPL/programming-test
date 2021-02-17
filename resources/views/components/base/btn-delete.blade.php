<form action="{{ route($route, $params) }}" method="post" id="form-delete">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus ini?');" title="{{ $title }}">{{ $detail }}</button>
</form>