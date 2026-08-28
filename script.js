/* =========================================================
   GR NETWORK MEMBERSHIP APPLICATION
   Multi-Step Form + Validation + File Upload + Submit
========================================================= */

let currentStepIndex = 0;

const steps = document.querySelectorAll(".form-step");

const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const submitBtn = document.getElementById("submitBtn");

const form = document.getElementById("multiStepForm");
const successMessage = document.getElementById("successMessage");


/* =========================================================
   UPDATE STEP VIEW
========================================================= */

function updateStepView() {

    steps.forEach((step, index) => {

        step.classList.toggle(
            "active",
            index === currentStepIndex
        );

        const tracker =
            document.getElementById(`track-${index}`);

        if (!tracker) return;

        tracker.classList.remove(
            "active",
            "completed"
        );

        const dot =
            tracker.querySelector(".tracker-dot");

        if (index === currentStepIndex) {

            tracker.classList.add("active");

            if (dot) {
                dot.innerHTML = index + 1;
            }

        } else if (index < currentStepIndex) {

            tracker.classList.add("completed");

            if (dot) {
                dot.innerHTML =
                    '<i class="fa-solid fa-check"></i>';
            }

        } else {

            if (dot) {
                dot.innerHTML = index + 1;
            }

        }

    });


    /* Previous button */

    prevBtn.style.display =
        currentStepIndex === 0
            ? "none"
            : "inline-flex";


    /* Last step */

    if (
        currentStepIndex ===
        steps.length - 1
    ) {

        nextBtn.style.display = "none";

        submitBtn.style.display =
            "inline-flex";

    } else {

        nextBtn.style.display =
            "inline-flex";

        submitBtn.style.display =
            "none";

    }

}


/* =========================================================
   LINKEDIN URL NORMALIZATION
========================================================= */

function normalizeLinkedInURL() {

    const input =
        document.getElementById("linkedinUrl");

    if (!input) return true;

    let value =
        input.value.trim();

    if (!value) {

        input.classList.add("error");

        return false;
    }


    /*
       Add https:// automatically
       if user enters:

       linkedin.com/in/name

       or

       www.linkedin.com/in/name
    */

    if (
        !value.startsWith("http://") &&
        !value.startsWith("https://")
    ) {

        value = "https://" + value;

        input.value = value;

    }


    try {

        const url =
            new URL(value);


        const hostname =
            url.hostname
                .toLowerCase()
                .replace(/^www\./, "");


        /*
           Only LinkedIn URLs allowed
        */

        if (
            hostname !== "linkedin.com" &&
            hostname !== "lnkd.in"
        ) {

            input.classList.add("error");

            alert(
                "Please enter a valid LinkedIn profile URL.\n\nExample:\nhttps://linkedin.com/in/your-profile"
            );

            input.focus();

            return false;
        }


        /*
           LinkedIn profile should normally
           contain /in/
        */

        if (
            hostname === "linkedin.com" &&
            !url.pathname
                .toLowerCase()
                .startsWith("/in/")
        ) {

            input.classList.add("error");

            alert(
                "Please enter your LinkedIn profile URL.\n\nExample:\nhttps://linkedin.com/in/your-profile"
            );

            input.focus();

            return false;
        }


        input.classList.remove("error");

        return true;

    } catch (error) {

        input.classList.add("error");

        alert(
            "Please enter a valid LinkedIn URL.\n\nExample:\nhttps://linkedin.com/in/your-profile"
        );

        input.focus();

        return false;
    }

}


/* =========================================================
   VALIDATE CURRENT STEP
========================================================= */

function validateStepInputs() {

    const currentContainer =
        steps[currentStepIndex];

    if (!currentContainer) {
        return false;
    }


    const inputs =
        currentContainer.querySelectorAll(
            "input[required], textarea[required], select[required]"
        );


    let valid = true;


    /* Remove old error classes */

    inputs.forEach(input => {

        input.classList.remove("error");

    });


    /* =====================================================
       INPUT VALIDATION
    ===================================================== */

    inputs.forEach(input => {

        /* -----------------------------------------------
           RADIO
        ----------------------------------------------- */

        if (input.type === "radio") {

            const group =
                currentContainer.querySelectorAll(
                    `input[name="${input.name}"]`
                );

            const checked =
                [...group].some(
                    radio => radio.checked
                );

            if (!checked) {

                valid = false;

            }

        }


        /* -----------------------------------------------
           CHECKBOX
        ----------------------------------------------- */

        else if (input.type === "checkbox") {

            if (!input.checked) {

                valid = false;

            }

        }


        /* -----------------------------------------------
           FILE
        ----------------------------------------------- */

        else if (input.type === "file") {

            if (
                !input.files ||
                input.files.length === 0
            ) {

                valid = false;

            }

        }


        /* -----------------------------------------------
           NORMAL INPUT
        ----------------------------------------------- */

        else {

            if (!input.value.trim()) {

                valid = false;

                input.classList.add("error");

            }

        }

    });


    /* =====================================================
       LINKEDIN VALIDATION
    ===================================================== */

    if (currentStepIndex === 0) {

        const linkedinInput =
            document.getElementById("linkedinUrl");

        if (linkedinInput) {

            if (
                !normalizeLinkedInURL()
            ) {

                valid = false;

            }

        }

    }


    return valid;

}


/* =========================================================
   CHANGE STEP
========================================================= */

function changeStep(direction) {


    /* Going forward */

    if (
        direction === 1 &&
        !validateStepInputs()
    ) {

        alert(
            "Please complete all required fields before continuing."
        );

        return;

    }


    currentStepIndex += direction;


    /* Minimum */

    if (currentStepIndex < 0) {

        currentStepIndex = 0;

    }


    /* Maximum */

    if (
        currentStepIndex >=
        steps.length
    ) {

        currentStepIndex =
            steps.length - 1;

    }


    updateStepView();


    /* Scroll to membership form */

    const membershipContainer =
        document.querySelector(
            ".membership-container"
        );

    if (membershipContainer) {

        membershipContainer.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

    }

}


/* =========================================================
   FILE NAME DISPLAY
========================================================= */

function showFileName(input, targetId) {

    const display =
        document.getElementById(targetId);

    if (!display) return;


    if (
        input.files &&
        input.files[0]
    ) {

        display.innerHTML =
            '<i class="fa-solid fa-circle-check"></i> ' +
            "Selected: " +
            input.files[0].name;

    } else {

        display.innerHTML = "";

    }

}


/* =========================================================
   PAYMENT TAB
========================================================= */

function switchPaymentTab(tab) {

    const tabButtons =
        document.querySelectorAll(
            ".tab-btn"
        );

    const tabContents =
        document.querySelectorAll(
            ".payment-tab-content"
        );


    tabButtons.forEach(button => {

        button.classList.remove(
            "active"
        );

    });


    tabContents.forEach(content => {

        content.classList.remove(
            "active"
        );

    });


    if (tab === "qr") {

        const qrTab =
            document.getElementById(
                "qrTab"
            );

        if (qrTab) {

            qrTab.classList.add(
                "active"
            );

        }

        if (tabButtons[0]) {

            tabButtons[0].classList.add(
                "active"
            );

        }

    }


    if (tab === "upi") {

        const upiTab =
            document.getElementById(
                "upiTab"
            );

        if (upiTab) {

            upiTab.classList.add(
                "active"
            );

        }

        if (tabButtons[1]) {

            tabButtons[1].classList.add(
                "active"
            );

        }

    }

}


/* =========================================================
   COPY UPI ID
========================================================= */

function copyUPIID() {

    const upiElement =
        document.getElementById(
            "upiIdText"
        );

    if (!upiElement) return;


    const upiId =
        upiElement.textContent.trim();


    if (
        navigator.clipboard &&
        window.isSecureContext
    ) {

        navigator.clipboard
            .writeText(upiId)
            .then(() => {

                alert(
                    "UPI ID copied successfully!"
                );

            })
            .catch(() => {

                fallbackCopyUPI(upiId);

            });

    } else {

        fallbackCopyUPI(upiId);

    }

}


/* =========================================================
   FALLBACK COPY
========================================================= */

function fallbackCopyUPI(text) {

    const textarea =
        document.createElement(
            "textarea"
        );

    textarea.value = text;

    textarea.style.position =
        "fixed";

    textarea.style.opacity = "0";

    document.body.appendChild(
        textarea
    );

    textarea.select();

    try {

        document.execCommand(
            "copy"
        );

        alert(
            "UPI ID copied successfully!"
        );

    } catch (error) {

        alert(
            "Please copy the UPI ID manually:\n" +
            text
        );

    }

    document.body.removeChild(
        textarea
    );

}


/* =========================================================
   FORM SUBMISSION
========================================================= */

form.addEventListener(
    "submit",
    async function(event) {

        event.preventDefault();


        /* Validate final step */

        if (!validateStepInputs()) {

            alert(
                "Please check all required fields and declarations."
            );

            return;

        }


        /* Validate LinkedIn one more time */

        if (
            !normalizeLinkedInURL()
        ) {

            return;

        }


        /*
           Create FormData
           including files
        */

        const formData =
            new FormData(form);


        /*
           IMPORTANT:
           Your PHP file must be submit.php
        */

        try {

            submitBtn.disabled = true;

            submitBtn.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';


            const response =
                await fetch(
                    "register.php",
                    {
                        method: "POST",
                        body: formData
                    }
                );


            const text =
                await response.text();


            console.log(
                "Server response:",
                text
            );


            let result;


            try {

                result =
                    JSON.parse(text);

            } catch (jsonError) {

                console.error(
                    "Invalid JSON response:",
                    text
                );

                throw new Error(
                    "Server returned an invalid response."
                );

            }


            if (!response.ok || !result.success) {

                throw new Error(
                    result.message ||
                    "Application submission failed."
                );

            }


            /* ---------------------------------------------
               SUCCESS
            --------------------------------------------- */

            form.style.display =
                "none";


            successMessage.classList.add(
                "show"
            );


            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });


        } catch (error) {

            console.error(
                "Submission Error:",
                error
            );


            alert(
                error.message ||
                "Submission failed. Please try again."
            );


            submitBtn.disabled =
                false;


            submitBtn.innerHTML =
                'Submit Application <i class="fa-solid fa-paper-plane"></i>';

        }

    }
);


/* =========================================================
   LINKEDIN INPUT - AUTO FIX
========================================================= */

const linkedinInput =
    document.getElementById(
        "linkedinUrl"
    );


if (linkedinInput) {

    linkedinInput.addEventListener(
        "blur",
        function() {

            let value =
                this.value.trim();


            if (!value) return;


            if (
                !value.startsWith("http://") &&
                !value.startsWith("https://")
            ) {

                this.value =
                    "https://" + value;

            }

        }
    );


    linkedinInput.addEventListener(
        "input",
        function() {

            this.classList.remove(
                "error"
            );

        }
    );

}


/* =========================================================
   INITIAL LOAD
========================================================= */

updateStepView();