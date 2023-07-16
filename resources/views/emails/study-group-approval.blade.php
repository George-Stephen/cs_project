<!DOCTYPE html>
<html>
<head>
    <title>Study Group Application Approved</title>
</head>
<body>
    <h1>Congratulations! Your Study Group Application has been Approved</h1>
    
    <p>Dear {{ $applicant->full_name }},</p>

    <p>We are pleased to inform you that your study group application for "{{ $studyGroup->group_name }}" has been approved.</p>
    
    <p>You can now join the study group and start collaborating with other members.</p>

    <p>Please click on this <a href="{{ $studyGroup->group_link }}">link</a> to join the connect with other members </p>
    
    <p>Thank you for your interest in our study group.</p>

    <p>Best regards,</p>
    <p>The Study Group Team</p>
</body>
</html>
