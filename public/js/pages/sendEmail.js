/**
 *
 * AuthLogin
 *
 * Pages.Authentication.Login page content scripts. Initialized from scripts.js file.
 *
 *
 */

class AuthLogin {
    constructor() {
        // Initialization of the page plugins
        this._initForm();
        console.log("kjdj");
    }

    // Form validation
    _initForm() {
        const form = document.getElementById('sendEmailForm');
        if (!form) {
            return;
        }
        const validateOptions = {
            rules: {
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                email: {
                    email: 'Your email address must be in correct format!',
                },
            },
        };
        jQuery(form).validate(validateOptions);
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            event.stopPropagation();
            if (jQuery(form).valid()) {
                const formValues = {
                    email: form.querySelector('[name="email"]').value,
                };
                console.log(formValues);
                form.submit();
                return true;
            }
        });
    }
}
