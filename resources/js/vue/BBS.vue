<template>
    <form enctype="multipart/form-data" method="post" class="BBSform">
        <textarea
            class="BBScomment"
            :placeholder="placeholderGuide"
            v-model="tmptext"
        ></textarea>
        <label class="BBSsubmit_wrapper">
            <p class="BBSsubmit_label"><span>投稿</span></p>
            <input
                type="submit"
                value="投稿"
                class="BBSsubmit"
                @click="contribute"
            />
        </label>
    </form>

    <ul class="BBSarchive" v-for="comment in comments" :key="comment.id">
        <li class="BBSarchive_comment" :id="'comment_as_comment' + comment.id">
            <div class="BBSarchive_head">
                <span class="BBSarchive_number" v-text="comment.id"></span>
                <span class="BBSarchive_date" v-text="comment.date"></span>
            </div>
            <div
                class="BBSarchive_text for_comment"
                v-text="comment.text"
            ></div>
        </li>
    </ul>
</template>

<script>
import { ref, onMounted } from 'vue'

export default {
    setup() {
        let comments = ref([])
        let tmptext = ref("")
        let placeholderGuide = ref("投稿内容を入力")

        onMounted(() => {
            axios.get('/bbs/existingComments')
            .then((response) => {
                let dataArray = response.data
                dataArray.forEach((elem) => {
                    let text = elem.comment
                    let id = elem.id
                    let date = elem.date
                    comments.value.push({
                        text: text,
                        id: id,
                        date: date
                    })
                })
            })
        })

        const contribute = (e) => {
            e.preventDefault()

            if (tmptext.value === "") {
                placeholderGuide.value = "コメントは必ず記入してください"
                return
            }

            axios
            .post('/bbs/contribute', {
                comment: tmptext.value
            })
            .then((response) => {
                comments.value.unshift({
                    text: response.data.comment,
                    id: response.data.id,
                    date: response.data.date
                })
                tmptext.value = ""
                placeholderGuide.value = "投稿内容を入力"
            })
            .catch((err) => {
                console.log(err)
            })
        }

        return {
            comments,
            tmptext,
            placeholderGuide,
            contribute
        }
    }
}
</script>
