<div class="tkt-departents wrap nosubsub">
    <h1 class="wp-heading-inline">دپارتمان ها</h1>
    <hr class="wp-header-end">
    <div id="ajax-response"></div>
    <div id="col-container" class="wp-clearfix">
        <div id="col-left">
            <div class="col-wrap">
                <h2>دپارتمان جدید</h2>
                <form action="" id="tkt-add-department" method="post">
                    <div class="form-field">
                        <label for="department-name">عنوان</label>
                        <input type="text" name="name" id="department-name">
                    </div>
                    <div class="form-field term-parent-wrap">
                        <label for="department-parent">والد</label>
                        <select name="parent" id="department-parent">
                            <option value="0">بدون والد</option>
                            <option value="1">عنوان دپارتمان</option>
                        </select>
                    <div class="form-field">
                        <label for="department-answerable">کاربر پاسخگو</label>
                        <select name="answerable[]" id="department-answerable"></select>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>