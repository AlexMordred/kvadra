class Form {
    /**
     * Create a new Form instance.
     * 
     * @param {object} fields 
     */
    constructor (fields) {
        this.data = fields;
        this.initialData = Object.assign({}, fields);

        this.isSubmitting = false;

        this.errors = [];
        this.error = '';
    }

    /**
     * Submit the form.
     * 
     * @param {string} method 
     * @param {string} endpoint
     * @param {object} data 
     */
    submit (method, endpoint, data = this.data) {
        this.isSubmitting = true;
        this.error = '';
        
        return new Promise((resolve, reject) => {
            axios[method](endpoint, data)
                .then((response) => {
                    this.onSuccess(response);

                    resolve(response);
                })
                .catch((response) => {
                    this.onFail(response);

                    reject(response);
                });
        });
    }

    /**
     * Handle a successful form submission.
     * 
     * @param {object} response 
     */
    onSuccess (response) {
        this.isSubmitting = false;
    }

    /**
     * Handle a failed form submission.
     * 
     * @param {object} response 
     */
    onFail (response) {        
        if (response.response.data.errors !== undefined) {
            if (typeof response.response.data.errors === 'string') {
                this.errors = [];
                this.error = response.response.data.errors;
            } else {
                this.error = '';
                this.errors = response.response.data.errors;
            }
        }

        this.isSubmitting = false;
    }

    /** 
     * Whether the form has any errors.
    */
    hasErrors () {
        return !! Object.keys(this.errors).length;
    }

    /**
     * Clear errors for the provided field.
     * 
     * @param {string} field 
     */
    clearErrors (field) {
        delete this.errors[field];
    }

    /** 
     * Reset the form to the initial state.
    */
    reset() {
        this.data = Object.assign({}, this.initialData);

        this.errors = [];
        this.error = '';

        this.isSubmitting = false;
    }
}

export default Form;