# Demo Vue Form Builder - Phalcon PHP
Vue Form Builder: https://github.com/sethsandaru/vue-form-builder   
This project is contain about Vue Form Builder demo usage in real life.

What will happen when we create a new form? (Business Usage obviously)
- First, Insert a new **VueForm** record, Version 1
- Second, Insert a new **VueFormData** (Contain the form configuration data), Version 1, belong to **VueForm**.
- Finally, you got a **VueFormID**, save it somewhere and when you need, you can retrieve the form easily.

The same go to update an existed form. But we still insert a new **VueFormData** record, with Version n+1.

