<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            padding: 30px 20px;
            color: #e0e0e0;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(90deg, #00d2ff, #3a7bd5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }
        h1 i { -webkit-text-fill-color: #00d2ff; margin-right: 10px; }

        .container {
            max-width: 950px;
            margin: auto;
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        }

        /* Tabs */
        .tabs {
            display: flex;
            background: rgba(0, 0, 0, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .tabs button {
            flex: 1; padding: 14px; border: none; background: transparent;
            color: #8a8a9a; cursor: pointer; font-size: 13px; font-weight: 600;
            letter-spacing: 0.5px; transition: all 0.3s ease; position: relative;
            font-family: 'Inter', sans-serif;
        }
        .tabs button i { margin-right: 6px; font-size: 14px; }
        .tabs button:hover { color: #fff; background: rgba(255,255,255,0.05); }
        .tabs button.active { color: #fff; }
        .tabs button.active::after {
            content: ''; position: absolute; bottom: 0; left: 20%; width: 60%;
            height: 3px; background: linear-gradient(90deg, #00d2ff, #3a7bd5);
            border-radius: 3px 3px 0 0;
        }

        /* Tab Content */
        .tab-content { display: none; padding: 28px; animation: fadeIn 0.4s ease; }
        @keyframes fadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }
        .tab-content.active { display: block; }

        h2 {
            margin-bottom: 20px; font-size: 1.2rem; font-weight: 600; color: #fff;
            padding-bottom: 10px; border-bottom: 2px solid rgba(0,210,255,0.3);
        }
        h2 i { margin-right: 8px; color: #3a7bd5; }

        /* Form Styles */
        label {
            display: block; margin-top: 12px; font-weight: 500; font-size: 12px;
            color: #a0a0b8; text-transform: uppercase; letter-spacing: 0.5px;
        }
        input, select {
            width: 100%; padding: 10px 14px; margin-top: 6px;
            border: 1px solid rgba(255,255,255,0.12); border-radius: 8px;
            background: rgba(255,255,255,0.06); color: #e0e0e0;
            font-size: 14px; font-family: 'Inter', sans-serif;
            transition: all 0.3s ease; outline: none;
        }
        input:focus, select:focus {
            border-color: #3a7bd5; background: rgba(58,123,213,0.08);
            box-shadow: 0 0 0 3px rgba(58,123,213,0.15);
        }
        input[readonly] {
            background: rgba(255,255,255,0.02); color: #666; cursor: not-allowed;
            border-color: rgba(255,255,255,0.06);
        }
        input::placeholder { color: #555; }
        .err { color: #ff6b6b; font-size: 11px; margin-left: 6px; }

        /* Buttons */
        .btn {
            margin-top: 18px; padding: 11px 28px; border: none; border-radius: 8px;
            cursor: pointer; color: #fff; font-size: 14px; font-weight: 600;
            font-family: 'Inter', sans-serif; letter-spacing: 0.5px;
            transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: inline-flex; align-items: center; gap: 8px;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.3); }
        .btn:active { transform: translateY(0); }
        .btn-green { background: linear-gradient(135deg, #00b09b, #96c93d); }
        .btn-blue { background: linear-gradient(135deg, #3a7bd5, #00d2ff); }
        .btn-red { background: linear-gradient(135deg, #e53935, #ff6b6b); }
        .btn-info { background: linear-gradient(135deg, #667eea, #764ba2); }
        .btn-orange { background: linear-gradient(135deg, #f7971e, #ffd200); color: #333; }
        .btn-sm { padding: 9px 18px; font-size: 13px; margin-top: 6px; }

        /* Table */
        .table-wrap {
            overflow-x: auto; margin-top: 15px; border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 14px; text-align: left; font-size: 13px; border-bottom: 1px solid rgba(255,255,255,0.06); }
        th {
            background: rgba(58,123,213,0.15); color: #8ab4f8; font-weight: 600;
            text-transform: uppercase; font-size: 11px; letter-spacing: 0.8px;
        }
        tr { transition: background 0.2s ease; }
        tr:hover { background: rgba(255,255,255,0.04); }
        td { color: #c8c8d8; }

        /* Message */
        .msg {
            padding: 12px 20px; margin: 12px 28px; border-radius: 8px; display: none;
            text-align: center; font-weight: 500; font-size: 14px; animation: slideDown 0.3s ease;
        }
        @keyframes slideDown { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }
        .msg.success { display:block; background:rgba(0,176,155,0.15); color:#00e6c8; border:1px solid rgba(0,176,155,0.3); }
        .msg.error { display:block; background:rgba(229,57,53,0.15); color:#ff6b6b; border:1px solid rgba(229,57,53,0.3); }

        /* Form Grid */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }
        .form-grid .full-width { grid-column: 1 / -1; }

        /* Fetch Section */
        .fetch-row { display: flex; gap: 12px; align-items: flex-end; }
        .fetch-row > div { flex: 1; }

        /* Employee Card Preview */
        .emp-card {
            background: rgba(58,123,213,0.08); border: 1px solid rgba(58,123,213,0.2);
            border-radius: 12px; padding: 18px; margin: 18px 0; display: none;
            animation: fadeIn 0.4s ease;
        }
        .emp-card.show { display: block; }
        .emp-card-header {
            display: flex; align-items: center; gap: 14px;
            padding-bottom: 14px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 14px;
        }
        .emp-avatar {
            width: 48px; height: 48px; border-radius: 50%;
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; font-weight: 700; color: #fff;
        }
        .emp-card-name { font-size: 16px; font-weight: 600; color: #fff; }
        .emp-card-sub { font-size: 12px; color: #8a8a9a; margin-top: 2px; }
        .emp-card-details {
            display: grid; grid-template-columns: 1fr 1fr; gap: 8px;
        }
        .emp-detail { font-size: 13px; color: #a0a0b8; }
        .emp-detail span { color: #c8c8d8; font-weight: 500; }

        /* Update form hidden by default */
        .update-form { display: none; animation: fadeIn 0.4s ease; }
        .update-form.show { display: block; }

        /* Info badge */
        .info-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(0,210,255,0.1); border: 1px solid rgba(0,210,255,0.2);
            border-radius: 6px; padding: 8px 14px; font-size: 12px; color: #8ab4f8;
            margin-bottom: 15px;
        }
        .info-badge i { color: #00d2ff; }

        @media (max-width: 600px) {
            .form-grid, .emp-card-details { grid-template-columns: 1fr; }
            h1 { font-size: 1.4rem; }
            .fetch-row { flex-direction: column; }
        }
    </style>
</head>

<body>
    <h1><i class="fas fa-building"></i> Employee Management System</h1>
    <div class="container">
        <div class="tabs">
            <button class="active" onclick="showTab('add')"><i class="fas fa-user-plus"></i> Add</button>
            <button onclick="showTab('update')"><i class="fas fa-pen-to-square"></i> Update</button>
            <button onclick="showTab('delete')"><i class="fas fa-trash-can"></i> Delete</button>
            <button onclick="showTab('view')"><i class="fas fa-table-list"></i> View All</button>
        </div>
        <div id="msgBox" class="msg"></div>

        <!-- ADD -->
        <div id="tab-add" class="tab-content active">
            <h2><i class="fas fa-user-plus"></i> Add New Employee</h2>
            <form id="addForm" onsubmit="return addEmp(event)">
                <div class="form-grid">
                    <div>
                        <label>Name *</label>
                        <input type="text" id="aName" placeholder="Enter full name"><span class="err" id="aNameErr"></span>
                    </div>
                    <div>
                        <label>Email *</label>
                        <input type="email" id="aEmail" placeholder="example@mail.com"><span class="err" id="aEmailErr"></span>
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" id="aPhone" placeholder="10 digit number"><span class="err" id="aPhoneErr"></span>
                    </div>
                    <div>
                        <label>Department</label>
                        <input type="text" id="aDept" placeholder="e.g. IT, HR, Finance">
                    </div>
                    <div>
                        <label>Salary</label>
                        <input type="number" id="aSalary" step="0.01" min="0" placeholder="0.00">
                    </div>
                    <div>
                        <label>Registration No.</label>
                        <input type="text" id="aReg" placeholder="e.g. REG001">
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" id="aAddr" placeholder="City, State">
                    </div>
                    <div>
                        <label>Gender</label>
                        <select id="aGender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="full-width">
                        <button type="submit" class="btn btn-green"><i class="fas fa-plus"></i> Add Employee</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- UPDATE -->
        <div id="tab-update" class="tab-content">
            <h2><i class="fas fa-pen-to-square"></i> Update Employee</h2>
            <div class="info-badge"><i class="fas fa-circle-info"></i> Enter Employee ID to fetch current details, then edit the fields you want to update.</div>

            <div class="fetch-row">
                <div>
                    <label>Employee ID *</label>
                    <input type="number" id="uId" min="1" placeholder="Enter employee ID">
                    <span class="err" id="uIdErr"></span>
                </div>
                <div>
                    <button type="button" class="btn btn-orange btn-sm" onclick="fetchEmp()"><i class="fas fa-search"></i> Fetch Details</button>
                </div>
            </div>

            <!-- Employee Preview Card -->
            <div id="empCard" class="emp-card">
                <div class="emp-card-header">
                    <div class="emp-avatar" id="empAvatar">A</div>
                    <div>
                        <div class="emp-card-name" id="empCardName">--</div>
                        <div class="emp-card-sub" id="empCardSub">--</div>
                    </div>
                </div>
                <div class="emp-card-details">
                    <div class="emp-detail"><i class="fas fa-phone"></i> Phone: <span id="empCardPhone">--</span></div>
                    <div class="emp-detail"><i class="fas fa-building"></i> Dept: <span id="empCardDept">--</span></div>
                    <div class="emp-detail"><i class="fas fa-indian-rupee-sign"></i> Salary: <span id="empCardSalary">--</span></div>
                    <div class="emp-detail"><i class="fas fa-id-card"></i> Reg: <span id="empCardReg">--</span></div>
                    <div class="emp-detail"><i class="fas fa-map-marker-alt"></i> Address: <span id="empCardAddr">--</span></div>
                    <div class="emp-detail"><i class="fas fa-venus-mars"></i> Gender: <span id="empCardGender">--</span></div>
                </div>
            </div>

            <!-- Editable Update Form (hidden until fetch) -->
            <div id="updateFormWrap" class="update-form">
                <h2 style="font-size:1rem; margin-top:10px;"><i class="fas fa-edit"></i> Edit Details</h2>
                <form id="updForm" onsubmit="return updEmp(event)">
                    <div class="form-grid">
                        <div>
                            <label>Employee ID</label>
                            <input type="number" id="uIdReadonly" readonly>
                        </div>
                        <div>
                            <label>Registration No.</label>
                            <input type="text" id="uReg" readonly>
                        </div>
                        <div>
                            <label>Name *</label>
                            <input type="text" id="uName"><span class="err" id="uNameErr"></span>
                        </div>
                        <div>
                            <label>Email *</label>
                            <input type="email" id="uEmail"><span class="err" id="uEmailErr"></span>
                        </div>
                        <div>
                            <label>Phone</label>
                            <input type="text" id="uPhone">
                        </div>
                        <div>
                            <label>Department</label>
                            <input type="text" id="uDept">
                        </div>
                        <div>
                            <label>Salary</label>
                            <input type="number" id="uSalary" step="0.01" min="0">
                        </div>
                        <div>
                            <label>Address</label>
                            <input type="text" id="uAddr">
                        </div>
                        <div>
                            <label>Gender</label>
                            <select id="uGender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="full-width">
                            <button type="submit" class="btn btn-blue"><i class="fas fa-save"></i> Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- DELETE -->
        <div id="tab-delete" class="tab-content">
            <h2><i class="fas fa-trash-can"></i> Delete Employee</h2>
            <form id="delForm" onsubmit="return delEmp(event)">
                <label>Employee ID *</label>
                <input type="number" id="dId" min="1" placeholder="Enter employee ID to delete"><span class="err" id="dIdErr"></span>
                <button type="submit" class="btn btn-red"><i class="fas fa-trash"></i> Delete Employee</button>
            </form>
            <div id="delResult"></div>
        </div>

        <!-- VIEW -->
        <div id="tab-view" class="tab-content">
            <h2><i class="fas fa-table-list"></i> All Employees</h2>
            <button class="btn btn-info" onclick="viewEmp()"><i class="fas fa-sync-alt"></i> Refresh</button>
            <div id="empTable"></div>
        </div>
    </div>

    <script>
        function showTab(name) {
            var tabs = document.querySelectorAll('.tab-content');
            var btns = document.querySelectorAll('.tabs button');
            for (var i = 0; i < tabs.length; i++) tabs[i].classList.remove('active');
            for (var i = 0; i < btns.length; i++) btns[i].classList.remove('active');
            document.getElementById('tab-' + name).classList.add('active');
            var names = ['add', 'update', 'delete', 'view'];
            btns[names.indexOf(name)].classList.add('active');
            if (name === 'view') viewEmp();
        }

        function showMsg(text, type) {
            var box = document.getElementById('msgBox');
            box.className = 'msg ' + type;
            box.textContent = text;
            setTimeout(function () { box.className = 'msg'; }, 3000);
        }

        function clrErr(ids) {
            for (var i = 0; i < ids.length; i++) document.getElementById(ids[i]).textContent = '';
        }

        function validEmail(e) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e); }
        function validPhone(p) { return /^[0-9]{10}$/.test(p); }
        function safe(v) { return (v && v !== 'null' && v !== null) ? v : '-'; }

        // ADD
        function addEmp(e) {
            e.preventDefault();
            clrErr(['aNameErr', 'aEmailErr', 'aPhoneErr']);
            var n = document.getElementById('aName').value.trim();
            var em = document.getElementById('aEmail').value.trim();
            var ph = document.getElementById('aPhone').value.trim();
            var ok = true;
            if (!n) { document.getElementById('aNameErr').textContent = 'Required'; ok = false; }
            if (!em || !validEmail(em)) { document.getElementById('aEmailErr').textContent = 'Valid email required'; ok = false; }
            if (ph && !validPhone(ph)) { document.getElementById('aPhoneErr').textContent = '10 digits required'; ok = false; }
            if (!ok) return false;

            var fd = new FormData();
            fd.append('name', n); fd.append('email', em); fd.append('phone', ph);
            fd.append('department', document.getElementById('aDept').value.trim());
            fd.append('salary', document.getElementById('aSalary').value);
            fd.append('registration', document.getElementById('aReg').value.trim());
            fd.append('address', document.getElementById('aAddr').value.trim());
            fd.append('gender', document.getElementById('aGender').value);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_employee.php', true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                alert(r.message);
                showMsg(r.message, r.status);
                if (r.status === 'success') document.getElementById('addForm').reset();
            };
            xhr.send(fd);
            return false;
        }

        // FETCH EMPLOYEE FOR UPDATE
        function fetchEmp() {
            clrErr(['uIdErr']);
            var id = document.getElementById('uId').value;
            if (!id || id <= 0) { document.getElementById('uIdErr').textContent = 'Enter a valid ID'; return; }

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_employee.php?id=' + id, true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                if (r.status === 'success') {
                    var d = r.data;
                    // Show employee card
                    document.getElementById('empCard').classList.add('show');
                    document.getElementById('empAvatar').textContent = (d.name || 'E')[0].toUpperCase();
                    document.getElementById('empCardName').textContent = safe(d.name);
                    document.getElementById('empCardSub').textContent = 'ID: ' + d.id + ' | ' + safe(d.email);
                    document.getElementById('empCardPhone').textContent = safe(d.phone);
                    document.getElementById('empCardDept').textContent = safe(d.department);
                    document.getElementById('empCardSalary').textContent = safe(d.salary);
                    document.getElementById('empCardReg').textContent = safe(d.registration);
                    document.getElementById('empCardAddr').textContent = safe(d.address);
                    document.getElementById('empCardGender').textContent = safe(d.gender);

                    // Populate editable form
                    document.getElementById('uIdReadonly').value = d.id;
                    document.getElementById('uReg').value = d.registration || '';
                    document.getElementById('uName').value = d.name || '';
                    document.getElementById('uEmail').value = d.email || '';
                    document.getElementById('uPhone').value = d.phone || '';
                    document.getElementById('uDept').value = d.department || '';
                    document.getElementById('uSalary').value = d.salary || '';
                    document.getElementById('uAddr').value = d.address || '';
                    document.getElementById('uGender').value = d.gender || '';

                    // Show form
                    document.getElementById('updateFormWrap').classList.add('show');
                } else {
                    alert(r.message);
                    document.getElementById('empCard').classList.remove('show');
                    document.getElementById('updateFormWrap').classList.remove('show');
                }
            };
            xhr.send();
        }

        // UPDATE
        function updEmp(e) {
            e.preventDefault();
            clrErr(['uNameErr', 'uEmailErr']);
            var id = document.getElementById('uIdReadonly').value;
            var n = document.getElementById('uName').value.trim();
            var em = document.getElementById('uEmail').value.trim();
            var ok = true;
            if (!n) { document.getElementById('uNameErr').textContent = 'Required'; ok = false; }
            if (!em || !validEmail(em)) { document.getElementById('uEmailErr').textContent = 'Valid email required'; ok = false; }
            if (!ok) return false;

            var fd = new FormData();
            fd.append('id', id); fd.append('name', n); fd.append('email', em);
            fd.append('phone', document.getElementById('uPhone').value.trim());
            fd.append('department', document.getElementById('uDept').value.trim());
            fd.append('salary', document.getElementById('uSalary').value);
            fd.append('registration', document.getElementById('uReg').value.trim());
            fd.append('address', document.getElementById('uAddr').value.trim());
            fd.append('gender', document.getElementById('uGender').value);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_employee.php', true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                alert(r.message);
                showMsg(r.message, r.status);
                if (r.status === 'success') fetchEmp(); // Refresh the card
            };
            xhr.send(fd);
            return false;
        }

        // DELETE
        function delEmp(e) {
            e.preventDefault();
            clrErr(['dIdErr']);
            var id = document.getElementById('dId').value;
            if (!id || id <= 0) { document.getElementById('dIdErr').textContent = 'Valid ID required'; return false; }
            if (!confirm('Are you sure you want to delete employee #' + id + '?')) return false;

            var fd = new FormData();
            fd.append('id', id);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_employee.php', true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                alert(r.message);
                showMsg(r.message, r.status);
                if (r.status === 'success') { document.getElementById('delForm').reset(); loadDelView(); }
            };
            xhr.send(fd);
            return false;
        }

        function loadDelView() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'view_employees.php', true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                var d = document.getElementById('delResult');
                if (r.data.length > 0) {
                    var h = '<div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Dept</th><th>Salary</th><th>Reg</th><th>Address</th><th>Gender</th></tr>';
                    for (var i = 0; i < r.data.length; i++) { var e = r.data[i]; h += '<tr><td>' + e.id + '</td><td>' + safe(e.name) + '</td><td>' + safe(e.email) + '</td><td>' + safe(e.phone) + '</td><td>' + safe(e.department) + '</td><td>' + safe(e.salary) + '</td><td>' + safe(e.registration) + '</td><td>' + safe(e.address) + '</td><td>' + safe(e.gender) + '</td></tr>'; }
                    d.innerHTML = h + '</table></div>';
                } else { d.innerHTML = '<p style="margin-top:15px;color:#8a8a9a;">No employees found.</p>'; }
            };
            xhr.send();
        }

        // VIEW
        function viewEmp() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'view_employees.php', true);
            xhr.onload = function () {
                var r = JSON.parse(xhr.responseText);
                var d = document.getElementById('empTable');
                if (r.data.length > 0) {
                    var h = '<div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Dept</th><th>Salary</th><th>Reg</th><th>Address</th><th>Gender</th></tr>';
                    for (var i = 0; i < r.data.length; i++) { var e = r.data[i]; h += '<tr><td>' + e.id + '</td><td>' + safe(e.name) + '</td><td>' + safe(e.email) + '</td><td>' + safe(e.phone) + '</td><td>' + safe(e.department) + '</td><td>' + safe(e.salary) + '</td><td>' + safe(e.registration) + '</td><td>' + safe(e.address) + '</td><td>' + safe(e.gender) + '</td></tr>'; }
                    d.innerHTML = h + '</table></div>';
                } else { d.innerHTML = '<p style="margin-top:15px;color:#8a8a9a;">No employees found.</p>'; }
            };
            xhr.send();
        }
    </script>
</body>

</html>