<template>
    <div>
        <div class="form-row">
            <div class="col-md-12 mb-3 md-form">
                <label>Avatar(please chose image size over 1280x720px)</label>
                <input type="file" name="avatar" class="form-control" placeholder="Event name" value=""
                       accept="image/*" required>
                <div class="invalid-feedback">
                </div>
            </div>
        </div>
        <div class="form-row" v-for="(event, i) in imageData" :key="i">
            <div class="col-md-4 mb-3 md-form">
                <label>Sub title number {{ i + 1}}</label>
                <input type="text" :name="`images[${i}][title]`" class="form-control" placeholder="Event name" value=""
                       accept="image/*" required>
                <div class="invalid-feedback">
                </div>
            </div>
            <div class="col-md-8 mb-3 md-form">
                <label>Sub image number {{ i + 1 }}</label>
                <input type="file" :name="`images[${i}][image]`" class="form-control" placeholder="Event name" value="" accept="image/*" required>
                <div class="invalid-feedback">
                </div>
            </div>
        </div>
        <div class="form-row pt-3">
            <div class="col-md-4 col-md-offset-4 mb-3 md-form text-center">
                <label>&nbsp;</label>
                <button class="btn btn-success btn-sm btn-rounded" type="button" id="addBtn" @click="addImage()">ADD IMAGE</button>
                <button class="btn btn-danger btn-sm btn-rounded" type="button" id="delBtn" @click="delImage()">DEL IMAGE</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                imageData: [],
            }
        },
        methods: {
            addImage() {
                this.imageData = [...this.imageData, {
                    text : '',
                    image : '',
                }]
            },

            delImage(index) {
                this.imageData.splice(index, 1)
            },
        }
    }
</script>
