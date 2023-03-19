<div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ session()->get('locale') == 'en' ? 'english' : 'arab' }}</a>
    <div class="dropdown-menu rounded-0 m-0">
        <a class="dropdown-item" id="ar">ar</a>
        <a class="dropdown-item" id="en">en</a>
    </div>
</div>
<form action="{{route('changeLang')}}" id="ar_frm">
    @csrf
    <input type="hidden" name="lang" value="ar">
</form>
<form action="{{route('changeLang')}}" id="en_frm">
    @csrf
    <input type="hidden" name="lang" value="en">
</form>

<script>
    document.getElementById('ar').onclick= function f1() {
        document.getElementById('ar_frm').submit();
    }

    document.getElementById('en').onclick= function f2() {
        document.getElementById('en_frm').submit();
    }


</script>
