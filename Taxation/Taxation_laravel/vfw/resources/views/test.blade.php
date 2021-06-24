@extends('layouts.main')
@extends('layouts.navbar')
@section('content')
<div id="v-model-textarea" class="demo">
    <span>Multiline message is:</span>
    <p style="white-space: pre-line;">@{{message }}</p>
    <br />
    <textarea v-model="message" placeholder="add multiple lines"></textarea>
</div>
@endsection
<script>
    var vm = new Vue({
        el: '#v-model-textarea',
        data: {
            message: ''
        }
    });
</script>