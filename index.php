x<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GR Network | Membership Application</title>

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="app-viewport">

<!-- =====================================================
     COMPANY INFORMATION
===================================================== -->

<div class="company-banner">

    <div class="company-top">

        <div>

            <span class="application-label">
                <i class="fa-solid fa-building"></i>
                MEMBERSHIP APPLICATION
            </span>

            <h1>
                <span class="work-sans-text">GOWTHAMRAJ NETWORK</span>
                INDIA PRIVATE LIMITED
            </h1>

            <h2>
                Application Form for
                <span>
                    <span class="work-sans-text">GR</span>
                    Network Tech Community Membership
                </span>
            </h2>

        </div>

    </div>

    <div class="company-description">

        <h3>
            <i class="fa-solid fa-circle-info"></i>
            About the Organisation
        </h3>

        <p>
            <strong>
                <span class="work-sans-text">
                    GOWTHAMRAJ NETWORK
                </span>
                INDIA PRIVATE LIMITED
            </strong>
            is an Educational Institution and Private Limited Company founded by
            our Visionary Founding Chairman & CEO
            <strong>GOWTHAM RAJ Sir</strong> on
            <strong>June 19, 2023.</strong>
        </p>

        <p>
            Our Founding Chairman & CEO's vision is to make
            <strong>
                quality learning available for everyone without any financial barriers.
            </strong>
            Our platform is a one-stop solution for everyone to learn technical
            concepts, receive industrial training, network with like-minded people,
            startup founders and industry experts, and discover meaningful
            career and business opportunities.
        </p>

    </div>

</div>


<!-- =====================================================
     APPLICATION PORTAL
===================================================== -->

<div class="membership-container">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div>

            <div class="sidebar-header">
                Membership Portal
            </div>

            <div class="sidebar-hero">

                <h2>
                    Join
                    <span class="work-sans-text">GR</span>
                    Network Tech Community
                </h2>

                <p>
                    Build, connect and grow with students,
                    professionals, founders and industry experts.
                </p>

            </div>

            <div class="step-tracker">

                <div class="tracker-item active" id="track-0">
                    <span class="tracker-dot">1</span>
                    Personal Details
                </div>

                <div class="tracker-item" id="track-1">
                    <span class="tracker-dot">2</span>
                    Position & Role
                </div>

                <div class="tracker-item" id="track-2">
                    <span class="tracker-dot">3</span>
                    Educational Info
                </div>

                <div class="tracker-item" id="track-3">
                    <span class="tracker-dot">4</span>
                    Skills & Goals
                </div>

                <div class="tracker-item" id="track-4">
                    <span class="tracker-dot">5</span>
                    Document Upload
                </div>

                <div class="tracker-item" id="track-5">
                    <span class="tracker-dot">6</span>
                    Payment Portal
                </div>

                <div class="tracker-item" id="track-6">
                    <span class="tracker-dot">7</span>
                    Declarations
                </div>

            </div>

        </div>

    </aside>


    <!-- FORM CONTENT -->

    <main class="form-content">

        <form
            id="multiStepForm"
            action="register.php"
            method="POST"
            enctype="multipart/form-data"
            novalidate
        >

<!-- =====================================================
     STEP 1
===================================================== -->

<div class="form-step active">

    <div class="step-header">

        <div>
            <div class="step-counter-label">
                STEP 1 OF 7
            </div>

            <h3>Personal Details</h3>
        </div>

        <div class="big-step-num">
            01
        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">

            <label>Full Name *</label>

            <input
                type="text"
                name="fullName"
                placeholder="Enter your official name"
                required
            >

        </div>


        <div class="form-group">

            <label>WhatsApp Number *</label>

            <input
                type="tel"
                name="whatsappNumber"
                placeholder="+91 00000 00000"
                required
            >

        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">

            <label>Email Address *</label>

            <input
                type="email"
                name="email"
                placeholder="name@example.com"
                required
            >

        </div>


        <div class="form-group">

            <label>Date of Birth *</label>

            <input
                type="date"
                name="dob"
                required
            >

        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">
          
            <label>Linkedin id*</label>
<input
type="text"
name="linkedinUrl"
id="linkedinUrl"
placeholder="https://linkedin.com/in/your-profile"
autocomplete="url"
required>




        </div>


        <div class="form-group">

            <label>Current City *</label>

            <input
                type="text"
                name="currentCity"
                placeholder="Coimbatore"
                required
            >

        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">

            <label>Mother Tongue *</label>

            <div class="radio-box-group">

                <label class="radio-box">
                    <input
                        type="radio"
                        name="motherTongue"
                        value="Tamil"
                        required
                    >
                    Tamil
                </label>

                <label class="radio-box">
                    <input
                        type="radio"
                        name="motherTongue"
                        value="Other"
                    >
                    Other
                </label>

            </div>

        </div>


        <div class="form-group">

            <label>Gender *</label>

            <div class="radio-box-group">

                <label class="radio-box">
                    <input
                        type="radio"
                        name="gender"
                        value="Male"
                        required
                    >
                    Male
                </label>

                <label class="radio-box">
                    <input
                        type="radio"
                        name="gender"
                        value="Female"
                    >
                    Female
                </label>

            </div>

        </div>

    </div>


    <div class="form-group">

        <label>Nearest Location for Offline Events *</label>

        <div class="radio-box-group">

            <label class="radio-box">

                <input
                    type="radio"
                    name="eventLocation"
                    value="Coimbatore Region"
                    required
                >

                Coimbatore Region – Aug 30, 2026

            </label>


            <label class="radio-box">

                <input
                    type="radio"
                    name="eventLocation"
                    value="Chennai Region"
                >

                Chennai Region – Sep 7, 2026

            </label>

        </div>

    </div>


    <div class="form-group">

        <label>Permanent Address *</label>

        <textarea
            name="permanentAddress"
            rows="3"
            placeholder="Full residential address"
            required
        ></textarea>

    </div>


    <div class="form-group">

        <label>Current Address *</label>

        <textarea
            name="currentAddress"
            rows="3"
            placeholder="Current residential address"
            required
        ></textarea>

    </div>


    <div class="form-group">

        <label>GitHub Link</label>

        <input
            type="url"
            name="githubUrl"
            placeholder="https://github.com/username"
        >

    </div>

</div>


<!-- =====================================================
     STEP 2
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 2 OF 7
            </div>

            <h3>Current Position & Role</h3>

        </div>

        <div class="big-step-num">
            02
        </div>

    </div>


    <div class="form-group">

        <label>Target Member Category *</label>

        <div class="radio-box-group">

            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="College Students"
                    required
                >
                College Students
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="Job Seekers"
                >
                Job Seekers
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="IT Employees / Working Professionals"
                >
                IT Employees / Working Professionals
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="Startup Founders / Business Owners / Enterprises"
                >
                Startup Founders / Business Owners / Enterprises
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="Professors / Teaching Professionals / Doctors / Advocates"
                >
                Professors / Teaching Professionals / Doctors / Advocates
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="Government / Public Sector Employees"
                >
                Government / Public Sector Employees
            </label>


            <label class="radio-box">
                <input
                    type="radio"
                    name="targetCategory"
                    value="Interested Public"
                >
                Interested Public
            </label>

        </div>

    </div>


    <div class="form-group">

        <label>Current Organisation / College Name *</label>

        <input
            type="text"
            name="currentOrg"
            placeholder="Company or Institution name"
            required
        >

    </div>


    <div class="form-group">

        <label>Current Role / Designation *</label>

        <input
            type="text"
            name="currentRole"
            placeholder="Student / Developer / Manager / Founder"
            required
        >

    </div>

</div>


<!-- =====================================================
     STEP 3
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 3 OF 7
            </div>

            <h3>Educational Information</h3>

        </div>

        <div class="big-step-num">
            03
        </div>

    </div>


    <div class="form-group">

        <label>Highest Qualification *</label>

        <div class="radio-box-group">

            <label class="radio-box">
                <input
                    type="radio"
                    name="highestQual"
                    value="Undergraduate"
                    required
                >
                Undergraduate
            </label>

            <label class="radio-box">
                <input
                    type="radio"
                    name="highestQual"
                    value="Postgraduate"
                >
                Postgraduate
            </label>

            <label class="radio-box">
                <input
                    type="radio"
                    name="highestQual"
                    value="UG Student"
                >
                UG Student
            </label>

            <label class="radio-box">
                <input
                    type="radio"
                    name="highestQual"
                    value="PG Student"
                >
                PG Student
            </label>

        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">

            <label>UG Degree *</label>

            <input
                type="text"
                name="ugDegree"
                placeholder="B.E / B.Tech / B.Sc"
                required
            >

        </div>


        <div class="form-group">

            <label>UG Branch / Specialization *</label>

            <input
                type="text"
                name="ugBranch"
                placeholder="Computer Science Engineering"
                required
            >

        </div>

    </div>


    <div class="grid-2">

        <div class="form-group">

            <label>PG Degree</label>

            <input
                type="text"
                name="pgDegree"
                placeholder="M.E / M.Tech / MBA"
            >

        </div>


        <div class="form-group">

            <label>PG Branch / Specialization</label>

            <input
                type="text"
                name="pgBranch"
                placeholder="Computer Science / MBA"
            >

        </div>

    </div>

</div>


<!-- =====================================================
     STEP 4
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 4 OF 7
            </div>

            <h3>Skills & Objectives</h3>

        </div>

        <div class="big-step-num">
            04
        </div>

    </div>


    <div class="form-group">

        <label>Top Technical Skills *</label>

        <input
            type="text"
            name="techSkills"
            placeholder="JavaScript, Python, React, Java, SQL"
            required
        >

    </div>


    <div class="form-group">

        <label>Primary Areas of Interest *</label>

        <input
            type="text"
            name="areasInterest"
            placeholder="Career Guidance, Tech Upskilling, Startup Networking"
            required
        >

    </div>


    <div class="form-group">

        <label>Why do you want to join GR Network? *</label>

        <textarea
            name="joinReason"
            rows="5"
            placeholder="Explain your objective to build, connect and grow..."
            required
        ></textarea>

    </div>

</div>


<!-- =====================================================
     STEP 5
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 5 OF 7
            </div>

            <h3>Verification Documents</h3>

        </div>

        <div class="big-step-num">
            05
        </div>

    </div>


    <div class="form-group">

        <label>Government-issued ID Proof *</label>

        <div
            class="file-input-card"
            onclick="document.getElementById('idFile').click()"
        >

            <i class="fa-solid fa-id-card"></i>

            <p>
                Click to upload Government ID Proof
            </p>

            <small>
                PDF / JPG / PNG — Max 5MB
            </small>

            <input
                type="file"
                id="idFile"
                name="idProof"
                accept=".pdf,.png,.jpg,.jpeg"
                hidden
                required
                onchange="showFileName(this,'idFilePreview')"
            >

            <span
                class="file-name"
                id="idFilePreview"
            ></span>

        </div>

    </div>


    <div class="form-group">

        <label>Recent Photograph / Profile Photo *</label>

        <div
            class="file-input-card"
            onclick="document.getElementById('photoFile').click()"
        >

            <i class="fa-solid fa-user"></i>

            <p>
                Click to select passport photo
            </p>

            <small>
                JPG / PNG — Max 5MB
            </small>

            <input
                type="file"
                id="photoFile"
                name="photo"
                accept=".png,.jpg,.jpeg"
                hidden
                required
                onchange="showFileName(this,'photoPreview')"
            >

            <span
                class="file-name"
                id="photoPreview"
            ></span>

        </div>

    </div>

</div>


<!-- =====================================================
     STEP 6
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 6 OF 7
            </div>

            <h3>Payment Portal</h3>

        </div>

        <div class="big-step-num">
            06
        </div>

    </div>


    <div class="payment-tabs-wrapper">

        <div class="payment-tab-buttons">

            <button
                type="button"
                class="tab-btn active"
                onclick="switchPaymentTab('qr')"
            >
                <i class="fa-solid fa-qrcode"></i>
                Scan QR Code
            </button>


            <button
                type="button"
                class="tab-btn"
                onclick="switchPaymentTab('upi')"
            >
                <i class="fa-solid fa-mobile-screen-button"></i>
                Pay using UPI
            </button>

        </div>


        <div
            class="payment-tab-content active"
            id="qrTab"
        >

            <div class="payment-box">

                <p class="qr-title">
                    Scan using any UPI App
                </p>

                <div class="qr-frame">

                    <img
                        src="GooglePay_QR (700).png"
                        alt="GR Network Payment QR"
                    >

                </div>

                <small>
                    Open GPay, PhonePe, Paytm, or BHIM to scan and pay.
                </small>

            </div>

        </div>


        <div
            class="payment-tab-content"
            id="upiTab"
        >

            <div class="payment-box">

                <p class="upi-title">
                    Direct UPI Transfer
                </p>

                <div class="upi-action-box">

                    <span class="upi-pill">

                        <i class="fa-solid fa-wallet"></i>

                        <span id="upiIdText">
                            gowthamrajnetwork@upi
                        </span>

                    </span>


                    <button
                        type="button"
                        class="btn-copy-upi"
                        onclick="copyUPIID()"
                    >
                        <i class="fa-solid fa-copy"></i>
                        Copy UPI ID
                    </button>

                </div>

                <small>
                    Copy the UPI ID above and complete payment in your UPI application.
                </small>

            </div>

        </div>

    </div>


    <div class="form-group">

        <label>Payment Confirmation *</label>

        <label class="radio-box">

            <input
                type="radio"
                name="paymentDone"
                value="Yes"
                required
            >

            I have successfully completed the membership fee payment.

        </label>

    </div>


    <div class="form-group">

        <label>Transaction UTR / Reference ID *</label>

        <input
            type="text"
            name="transactionId"
            placeholder="Enter UTR / Transaction Reference ID"
            required
        >

    </div>


    <div class="form-group">

        <label>Upload Payment Receipt *</label>

        <div
            class="file-input-card"
            onclick="document.getElementById('paymentFile').click()"
        >

            <i class="fa-solid fa-receipt"></i>

            <p>
                Click to upload Payment Screenshot
            </p>

            <small>
                PNG / JPG / PDF — Max 5MB
            </small>

            <input
                type="file"
                id="paymentFile"
                name="paymentProof"
                accept=".png,.jpg,.jpeg,.pdf"
                hidden
                required
                onchange="showFileName(this,'paymentPreview')"
            >

            <span
                class="file-name"
                id="paymentPreview"
            ></span>

        </div>

    </div>

</div>


<!-- =====================================================
     STEP 7
===================================================== -->

<div class="form-step">

    <div class="step-header">

        <div>

            <div class="step-counter-label">
                STEP 7 OF 7
            </div>

            <h3>Terms & Declarations</h3>

        </div>

        <div class="big-step-num">
            07
        </div>

    </div>


    <div class="form-group">

        <label>Membership Declarations *</label>

        <div class="checkbox-group">

            <label class="radio-box">

                <input
                    type="checkbox"
                    name="foundingMember"
                    value="1"
                    required
                >

                <span>
                    <strong>Founding Member Tier:</strong>
                    Access to applicable founding member benefits,
                    priority event invitations and special voting rights
                    where applicable.
                </span>

            </label>


            <label class="radio-box">

                <input
                    type="checkbox"
                    name="lifetimeAccess"
                    value="1"
                    required
                >

                <span>
                    <strong>Lifetime Access:</strong>
                    Eligible early members may receive lifetime
                    membership validity as per the applicable launch terms.
                </span>

            </label>


            <label class="radio-box">

                <input
                    type="checkbox"
                    name="transparentGuidelines"
                    value="1"
                    required
                >

                <span>
                    <strong>Transparent Guidelines:</strong>
                    I acknowledge the member-focused policy and understand
                    that applicable charges will be communicated transparently.
                </span>

            </label>

        </div>

    </div>


    <div class="form-group">

        <label>Final Consent *</label>

        <label class="radio-box">

            <input
                type="checkbox"
                name="consent"
                value="1"
                required
            >

            I confirm that all information provided by me is
            true and accurate to the best of my knowledge.

        </label>

    </div>

</div>


<!-- =====================================================
     BUTTONS
===================================================== -->

<div class="actions-bar">

    <button
        type="button"
        class="btn btn-prev"
        id="prevBtn"
        onclick="changeStep(-1)"
        style="display:none"
    >
        <i class="fa-solid fa-arrow-left"></i>
        Previous
    </button>


    <button
        type="button"
        class="btn btn-next"
        id="nextBtn"
        onclick="changeStep(1)"
    >
        Continue
        <i class="fa-solid fa-arrow-right"></i>
    </button>


    <button
        type="submit"
        class="btn btn-submit"
        id="submitBtn"
        style="display:none"
    >
        Submit Application
        <i class="fa-solid fa-paper-plane"></i>
    </button>

</div>

        </form>


        <!-- SUCCESS -->

        <div
            class="success-message"
            id="successMessage"
        >

            <div class="success-icon">
                <i class="fa-solid fa-check"></i>
            </div>

            <h2>
                Application Submitted Successfully!
            </h2>

            <p>
                Thank you for applying for
                GR Network Tech Community Membership.
            </p>

        </div>

    </main>

</div>

</div>

<script src="script.js"></script>

</body>
</html>