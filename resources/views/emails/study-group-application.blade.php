<!DOCTYPE html>
<html>
<head>
    <title>Study Group Application</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Study Group Application</div>

                    <div class="card-body">
                        <h5 class="card-title">New Study Group Application</h5>

                        <p class="card-text">Dear {{ $creator->full_name }},</p>

                        <p class="card-text">A new user has applied to join your study group "{{ $studyGroup->group_name }}".</p>

                        <h6 class="card-subtitle mb-2 text-muted">Applicant Details:</h6>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> {{ $applicant->full_name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $applicant->email }}</li>
                            <!-- Include any additional applicant details here -->
                        </ul>

                        <p class="card-text">To review and approve the application, please click the button below:</p>

                        <a href="{{ $approvalLink }}" class="btn btn-primary">Review Application</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
