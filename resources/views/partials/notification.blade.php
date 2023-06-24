@if(Session::has('signup') && Session::get('signup') == 0)
    <script>
        new Toast({
            message: 'User Has already Signed Up',
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('signup') && Session::get('signup') == 1)
    <script>
        new Toast({
            message: 'User Successfully Signed Up',
            type: 'success'
        });
    </script>
@endif
@if(Session::has('login') && Session::get('login') == 0)
    <script>
        new Toast({
            message: 'Email or Password incorrect',
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('login') && Session::get('login') == 1)
    <script>
        new Toast({
            message: 'Welcome to your page',
            type: 'success'
        });
    </script>
@endif
@if(Session::has('task') && Session::get('task') == 0)
    <script>
        new Toast({
            message: 'Task isn\'t added',
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('task') && Session::get('task') == 1)
    <script>
        new Toast({
            message: 'Task is added',
            type: 'success'
        });
    </script>
@endif
@if(Session::has('task_delete') && Session::get('task_delete') == 0)
    <script>
        new Toast({
            message: 'Task isn\'t deleted',
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('task_delete') && Session::get('task_delete') == 1)
    <script>
        new Toast({
            message: 'Task is deleted',
            type: 'success'
        });
    </script>
@endif
@if(Session::has('task_update') && Session::get('task_update') == 0)
    <script>
        new Toast({
            message: 'Task isn\'t edited',
            type: 'danger'
        });
    </script>
@endif
@if(Session::has('task_update') && Session::get('task_update') == 1)
    <script>
        new Toast({
            message: 'Task is edited',
            type: 'success'
        });
    </script>
@endif
