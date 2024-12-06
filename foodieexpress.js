        function dismiss(){
            document.getElementById("alert-box").style.display = "none";
        }
        function validation() {

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phoneNumber = document.getElementById('phone').value;
            if (name.trim() === '') {
                document.getElementById('error').innerHTML = 'Name is required';
                return false;
            }
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('error').innerHTML = 'Invalid email address';
                return false;
            }
            var phoneNumberRegex = /^\d{10}$/; // Assumes a 10-digit phone number
                if (!phoneNumberRegex.test(phoneNumber)) {
                    document.getElementById('error').innerHTML = 'Invalid phone number';
                    return false;
                }    

            return true;
        }