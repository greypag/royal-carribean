<script src="../js/jquery-1.10.4.min.js" charset="utf-8"></script>
<script type="text/javascript">
    $(function() {
        $.ajax({
            url: "http://stage.api.services.rccl.com/esl/content/rest/v3/retrieveCodeSets?header.brand=R&code=TNS",
            async : false,
            success: function() {
                console.log('Saving success');
            },
            error: function() {
                console.log('Saving failure');
            },
            timeout: 3000
        });
    });
</script>
