<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tasks Manager</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    
    <style>
        /* Styling for the select2 dropdown */
        #project-dropdown {
            max-width: 400px;
        }

        /* Styling for the add task name input */
        #add-task-name {
            max-width: 400px;
        }

        /* Styling for the task list */
        #task-list {
            margin: 0 auto;
            width: 80%;
        }

        /* Styling for the task items */
        .task-item {
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
            cursor: move;
        }

        /* Styling for the update and delete buttons */
        .task-actions {
            float: right;
            margin-left: 10px;
        }
        
        /* Styling for the project list */
        #project-list {
            margin: 0 auto;
            width: 90%;
        }

        /* Styling for the project items */
        .project-item {
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
        }

        /* Styling for the update and delete buttons */
        .project-actions {
            float: right;
            margin-left: 10px;
        }
    </style>
</head>

<body class="antialiased">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
    <script>
        var urlCreateProject = '<?= route('project.create') ?>';
        var urlUpdateProject = '<?= route('project.update') ?>';
        var urlDeleteProject = '<?= route('project.delete') ?>';
        var urlProjectDropdown = '<?= route('tasks.index')?>';
    </script>

    <div id="pjax-project-container" class="d-flex justify-content-center">
        <select id="project-dropdown" class="select2 form-control">
            <?php foreach ($projects as $value) : ?>
                <option><?= $value->name ?></option>
            <?php endforeach ?>
        </select>
        <button id="open-project-modal" class="btn btn-sm btn-primary mx-2" url="<?= route('project.index'); ?>" title="Create New Project">Create Project</button>
    </div>
    <div class="container py-4">
        <form class="row justify-content-center">
            <input id="add-task-name"  type="text" class="form-control col-3" placeholder="Task Name">
            <button id="add-task-btn" type="submit" class="btn btn-sm btn-primary col-1 ms-2">Add Task</button>
        </form>
    </div>
    <ul id="task-list">
        <?php foreach ($tasks as $value) : ?>
            <li id="task-{$value->id}" class="task-item">
                <span><?= $value->name ?></span>
                <div class="task-actions">
                    <button class="update-task-btn btn btn-sm btn-info">Update</button>
                    <button class="delete-task-btn btn btn-sm btn-danger">Delete</button>
                </div>
            </li>
        <?php endforeach ?>
    </ul>

    <script type="text/javascript" src="{{ URL::asset('js/task-index.js') }}"></script>

    @include('task.modal')
</body>
</html>