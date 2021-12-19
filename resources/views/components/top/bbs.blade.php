<form enctype="multipart/form-data" method="post" class="BBSform">
    <textarea
        name="BBScomment"
        class="BBScomment"
        placeholder="投稿内容を入力"
    ></textarea>
    <div class="BBSimage_set">
        <label class="BBSimage_wrapper">
            <span class="BBSimage_label">
                <i class="far fa-image fa-2x"></i>
            </span>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input
                type="file"
                name="BBSimage"
                class="BBSimage"
                accept="image/png,image/jpg,image/jpeg,image/gif"
                multiple="false"
            />
        </label>
        <div class="BBSpreview_wrapper"></div>
    </div>
    <label class="BBSsubmit_wrapper">
        <p class="BBSsubmit_label"><span>投稿</span></p>
        <input
            type="submit"
            value="投稿"
            name="BBSsubmit"
            class="BBSsubmit"
        />
    </label>
</form>
