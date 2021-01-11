<!DOCTYPE html>
<html lang="zh">

@include('layouts.header')

<body class="page-body boxed-container">
    <div class="page-container text-center">
        <input placeholder="输入分享暗号" id="key"/>
        <button id="redirect">打开</button>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#redirect").on("click", function() {
            var key = $("#key").val()
            if(key) {
                location.href = "/s/" + key
            }
        })
    })
</script>
<style>
    body {
        overflow: hidden;
    }
    input {
        width: 300px;
        height: 50px;
        font-size: 1.5rem;
    }
    button {
        width: 80px;
        height: 45px;
    }
    .page-container {
        display: block;
        padding-top: 100px !important;
    }
</style>
</html>