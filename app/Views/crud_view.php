<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Codeigniter 4 Crud Application</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Codeigniter 4 Crud Application</h2>

        <?php

        $session = \Config\Services::session();

        if($session->getFlashdata('success'))
        {
            echo '
            <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
            ';
        }

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Sample Data</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php

                        if($user_data)
                        {
                            foreach($user_data as $user)
                            {
                                echo '
                                <tr>
                                    <td>'.$user["id"].'</td>
                                    <td>'.$user["name"].'</td>
                                    <td>'.$user["email"].'</td>
                                    <td>'.$user["gender"].'</td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                            }
                        }

                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    if($pagination_link)
                    {
                        $pagination_link->setPath('crud');

                        echo $pagination_link->links();
                    }
                    
                    ?>

                </div>
            </div>
        </div>

    </div>
 
</body>
</html>
<style>
.pagination li a
{
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>