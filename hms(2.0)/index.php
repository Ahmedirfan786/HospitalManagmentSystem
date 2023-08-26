<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>HMS - Home</title>
</head>
<body>
<?php
include('include/header.php');
?>
    
    <div class="container-fluid py-2">
            <div class="row">
                <div class="section-head col-sm-12">
                    <h4><span><i class="fa fa-hospital-o" aria-hidden="true"></i>
                            Hospital managment </span> System</h4>
                    <p>A Hospital Management System (HMS) is an integrated software solution that streamlines hospital
                        operations. As an admin, you can manage doctors, patients, and appointments efficiently. You
                        oversee doctor details, patient records, and assign doctors to patients. The system allows
                        patients to make appointments online, and you can track and optimize resource allocation. HMS
                        provides reports and analytics for data-driven decision-making. It enhances patient care,
                        improves hospital efficiency, and ensures smooth operations.</p>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_one"><i class="fa fa-user"
                                aria-hidden="true"></i></span>
                        <h6>Admin</h6>
                        <p>To login as admin, click the designated link. Admin duties include managing doctors,
                            patients, appointments, resource allocation, and accessing reports for data-driven
                            decisions, enhancing patient care and hospital efficiency.
                        </p>
                        <a href="adminlogin.php" class="btn btn-outline-light" role="button">Login</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_two"><i class="fa fa-user-md"
                                aria-hidden="true"></i>
                        </span>
                        <h6>Doctor</h6>
                        <p>Doctors log in with the specified link. Duties include patient consultations, managing
                            medical records, treatment plans, and appointments. They prioritize quality care and
                            accurate diagnoses, updating medical information accordingly.</p>
                        <a href="apply.php" class="btn btn-outline-light" role="button">Apply</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_three"><i class="fa fa-medkit"
                                aria-hidden="true"></i>
                        </span>
                        <h6>Patients</h6>
                        <p>TPatients access via login link. Manage appointments, medical records, treatment plans, and
                            update info. Actively engage in healthcare, seeking quality treatment and staying informed
                            about their medical journey.</p>
                            <a href="patientsignup.php" class="btn btn-outline-light" role="button">Create Acc</a>
                    </div>
                </div>

            </div>
        </div>
</body>
</html>