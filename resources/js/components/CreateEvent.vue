<template>
  <div>
    <div class="col-12">
      <div class="contact-form">
        <form method="post" class="row" :action="storeUrl" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="_token" :value="csrf" />
          <div class="col-md-12 mb-3 md-form row">
            <div class="col-md-3 mb-3 md-form">
              <label>
                Tên
                <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                class="form-control"
                placeholder="Event name"
                name="name"
                v-model="oldData.name"
              />
              <span class="text-danger" role="alert" v-if="errors[`name`]">
                <strong>{{ errors[`name`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-3 mb-3 md-form">
              <label>
                Tiêu đề
                <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                class="form-control"
                placeholder="Event title"
                name="title"
                v-model="oldData.title"
              />
              <span class="text-danger" role="alert" v-if="errors[`title`]">
                <strong>{{ errors[`title`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-3 mb-3 md-form">
              <label>Địa điểm chính(sd gợi ý google map)</label>
              <input
                type="text"
                class="form-control"
                placeholder="Event location"
                name="location"
                v-model="oldData.location"
              />
              <span class="text-danger" role="alert" v-if="errors[`location`]">
                <strong>{{ errors[`location`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-3 mb-3 md-form">
              <label>
                Số vé
                <span class="text-danger">*</span> (min: 100 ticket)
              </label>
              <input
                type="text"
                class="form-control"
                placeholder="Event ticket number"
                name="ticket_number"
                v-model="oldData.ticket_number"
              />
              <span class="text-danger" role="alert" v-if="errors[`ticket_number`]">
                <strong>{{ errors[`ticket_number`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4 mb-3 md-form">
              <label>
                Thể loại
                <span class="text-danger">*</span>
              </label>
              <select name="type_id" class="form-control" v-model="oldData.type_id">
                <option value></option>typesData
                <option v-for="(type, index) in typesData" :value="index" :key="index">{{ type }}</option>
              </select>
              <span class="text-danger" role="alert" v-if="errors[`type_id`]">
                <strong>{{ errors[`type_id`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4 mb-3 md-form">
              <label>
                Danh mục
                <span class="text-danger">*</span>
              </label>
              <select name="category_id" class="form-control" v-model="oldData.category_id">
                <option value></option>typesData
                <option
                  v-for="(category, index) in categoriesData"
                  :value="index"
                  :key="index"
                >{{ category }}</option>
              </select>
              <span class="text-danger" role="alert" v-if="errors[`category_id`]">
                <strong>{{ errors[`category_id`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4 mb-3 md-form">
              <label>
                Loại mã giảm giá
                <span class="text-danger">*</span>
              </label>
              <select name="coupon_id" class="form-control" v-model="oldData.coupon_id">
                <option></option>
                <option
                  v-for="(coupon, index) in couponsData"
                  :value="index"
                  :key="index"
                >{{ coupon }}</option>
              </select>
              <span class="text-danger" role="alert" v-if="errors[`coupon_id`]">
                <strong>{{ errors[`coupon_id`][0] }}</strong>
              </span>
            </div>
          </div>
          <div class="col-md-12 mb-3 md-form row">
            <div class="col-md-4">
              <label>
                Ngày giờ công bố
                <span class="text-danger">*</span> (sau thời gian hiện tại 3 ngày)
              </label>
              <datetime format="DD-MM-YYYY H:i:s" name="public_date" v-model="oldData.public_date"></datetime>
              <span class="text-danger" role="alert" v-if="errors[`public_date`]">
                <strong>{{ errors[`public_date`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4">
              <label>
                Ngày giờ bắt đầu
                <span class="text-danger">*</span> (sau thời gian công bố)
              </label>
              <datetime format="DD-MM-YYYY H:i:s" name="start_date" v-model="oldData.start_date"></datetime>
              <span class="text-danger" role="alert" v-if="errors[`start_date`]">
                <strong>{{ errors[`start_date`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4">
              <label>
                Ngày giờ kết thúc
                <span class="text-danger">*</span> (sau thời gian bắt đầu)
              </label>
              <datetime format="DD-MM-YYYY H:i:s" name="end_date" v-model="oldData.end_date"></datetime>
              <span class="text-danger" role="alert" v-if="errors[`end_date`]">
                <strong>{{ errors[`end_date`][0] }}</strong>
              </span>
            </div>
          </div>
          <div class="col-md-12 mb-3 md-form">
            <label>
              Nội dung
              <span class="text-danger">*</span>
            </label>
            <vue-editor v-model="oldData.summary"></vue-editor>
            <input type="hidden" v-model="oldData.summary" name="summary" />
            <span class="text-danger" role="alert" v-if="errors[`summary`]">
              <strong>{{ errors[`summary`][0] }}</strong>
            </span>
          </div>
          <div class="col-md-12 mb-3 md-form row">
            <label class="col-md-4">
              Ảnh đại diện
              <span class="text-danger">*</span>(độ phân giải tối thiểu 1280x720px)
            </label>
            <div class="col-md-4">
              <input
                type="file"
                name="avatar"
                class="form-control"
                value
                accept="image/*"
                @change="onFileChange"
                required
              />
              <span class="text-danger" role="alert" v-if="errors[`avatar`]">
                <strong>{{ errors[`avatar`][0] }}</strong>
              </span>
            </div>
            <div class="preview col-md-4">
              <img v-if="url" :src="url" />
            </div>
            <br />
            <label class="col-12">Ảnh thêm(độ phân giải tối thiểu 1280x720px)</label>
          </div>
          <div class="col-md-12 mb-3 md-form row" v-for="(image, i) in imageData" :key="i">
            <div class="col-md-4">
              <label>Tiêu đề ảnh số {{ i + 1}}</label>
              <input
                type="text"
                :name="`images[${i}][title]`"
                class="form-control"
                placeholder="Image title"
                v-model="image.title"
                accept="image/*"
                required
              />
              <span class="text-danger" role="alert" v-if="errors[`images.${i}.title`]">
                <strong>{{ errors[`images.${i}.title`][0] }}</strong>
              </span>
            </div>
            <div class="col-md-4">
              <label>Ảnh thêm số {{ i + 1}}</label>
              <input
                type="file"
                :name="`images[${i}][image]`"
                @change="onSubFileChange($event, i)"
                class="form-control"
                placeholder="Image"
                accept="image/*"
                v-bind:id="i"
                required
              />
              <span class="text-danger" role="alert" v-if="errors[`images.${i}.image`]">
                <strong>{{ errors[`images.${i}.image`][0] }}</strong>
              </span>
            </div>
            <div class="preview col-md-4">
              <img v-if="subUrl[i]" :src="subUrl[i]" />
            </div>
          </div>
          <div class="col-md-12 mb-3 md-form row">
            <div class="col text-left">
              <button
                class
                type="button"
                style="border-radius: 30px; background-color: #28a745; color: #FFFFFF"
                id="addBtn"
                @click="addImage()"
              >
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm ảnh
              </button>
            </div>
            <div class="col text-right">
              <button
                class
                type="button"
                style="border-radius: 30px; background-color: #dc3545; color: #FFFFFF"
                id="addBtn"
                @click="delImage()"
              >
                <i class="fa fa-minus" aria-hidden="true"></i> Bỏ ảnh
              </button>
            </div>
          </div>
          <div class="col-md-12 mb-12 md-form">
            <!-- Button trigger modal -->
            <button
              type="button"
              class
              data-toggle="modal"
              data-target="#exampleModalLong"
              style="border: 0px"
            >Đồng ý với điều khoản</button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="exampleModalLong"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalLongTitle"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Điều khoản sử dụng dịch vụ.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">...</div>
                  <div class="modal-footer">
                    <span>Tôi hoàn toàn đồng ý với mọi điều khoản.</span>
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value
                      id="agreeCheck"
                      @click="isAccept = !isAccept"
                      data-toggle="modal"
                      data-target="#exampleModalLong"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="invalid-feedback">You must agree before submitting.</div>
            <br />
            <br />
            <div class="col-md-12 text-center">
              <button
                class="btn btn-primary btn-lg btn-rounded"
                :disabled="isAccept"
                type="submit"
                id="submitBtn"
              >Tạo sự kiện</button>
              <button
                class="btn btn-success btn-lg btn-rounded"
                type="button"
                id="reviewBtn"
                @click="isReview = !isReview"
              >Xem trước</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- event review -->
    <div class="col-12 single-event" v-if="isReview">
      <div class="event-content-wrap">
        <header class="entry-header flex flex-wrap justify-content-between align-items-end">
          <div class="single-event-heading">
            <h2 class="entry-title">{{ oldData.title }}</h2>
            <div class="event-location">{{ oldData.location }}</div>
            <div class="event-date" v-if="oldData.start_date">{{ moment(oldData.start_date, 'DD-MM-Y hh:mm:ss').format('MM ddd, Y @ h:mm A') }}</div>
          </div>
        </header>
        <br />
        <figure class="events-thumbnail">
          <img v-if="url" :src="url" id="event_thumbnail" alt />
        </figure>
      </div>
    </div>

    <div :class="{'d-none': !isReview}">
      <div class="tabs">
        <ul class="tabs-nav flex">
          <li
            class="tab-nav flex justify-content-center align-items-center"
            data-target="#tab_details"
          >Tiêu điểm</li>
          <li
            class="tab-nav flex justify-content-center align-items-center"
            data-target="#tab_venue"
          >Nội dung</li>
          <li
            class="tab-nav flex justify-content-center align-items-center"
            data-target="#tab_organizers"
          >Nhà cung cấp</li>
        </ul>
        <div class="tabs-container">
          <div id="tab_details" class="tab-content">
            <div class="flex flex-wrap justify-content-between">
              <div class="single-event-details">
                <div class="single-event-details-row">
                  <label>Thời gian bắt đầu:</label>
                  <p v-if="oldData.start_date">{{ moment(oldData.start_date, 'DD-MM-Y hh:mm:ss').format('MM ddd, Y @ h:mm A') }}</p>
                </div>

                <div class="single-event-details-row">
                  <label>Thời gian kết thúc:</label>
                  <p v-if="oldData.end_date">{{ moment(oldData.end_date, 'DD-MM-Y hh:mm:ss').format('MM ddd, Y @ h:mm A') }}</p>
                </div>

                <div class="single-event-details-row">
                  <label>Mã giảm giá:</label>
                  <p>
                    <span>{{ oldData.coupon_id ? couponsData[oldData.coupon_id] + '%' : null }}</span>
                  </p>
                </div>

                <div class="single-event-details-row">
                  <label>Thể loại</label>
                  <p>{{ oldData.type_id ? typesData[oldData.type_id] : null }}</p>
                </div>

                <div class="single-event-details-row">
                  <label>Danh mục:</label>
                  <p>{{ oldData.category_id ? categoriesData[oldData.category_id] : null }}</p>
                </div>

                <div class="single-event-details-row">
                  <label>Địa điểm:</label>
                  <p>{{ oldData.location }}</p>
                </div>

                <div class="single-event-details-row">
                  <label>Số lượng vé:</label>
                  <p>{{ oldData.ticket_number }}</p>
                </div>
              </div>

              <div class="single-event-map">
                <iframe
                  id="gmap_canvas"
                  :src="`https://maps.google.com/maps?q=
                                            ${oldData.location ? oldData.location.split(' ').join('+') : null}
                                            &t=&z=15&ie=UTF8&iwloc=&output=embed`"
                  frameborder="0"
                  scrolling="no"
                  marginheight="0"
                  marginwidth="0"
                ></iframe>
              </div>
            </div>
          </div>
          <div id="tab_venue" class="tab-content">
            <h5>Nội dung:</h5>
            <p v-html="oldData.summary"></p>
            <br />
            <h5>Hình ảnh của sự kiện:</h5>
            <div class="row">
              <div class="col-md-3" v-for="(image, index) in subUrl" :key="index">
                <img :src="image" alt="Snow" style="width:100%" />

                <label v-if="imageData[index]">{{ imageData[index].title }}</label>
              </div>
            </div>
          </div>
          <div id="tab_organizers" class="tab-images">
            <h3>Nhà cung cấp chủ quản</h3>
            <div class="col-md-12 row">
              <div class="col text-center">
                <figure class="events-thumbnail">
                  <a href="#">
                    <img
                      :src="supplierData.avatar"
                      class="logo"
                      alt
                    />
                  </a>
                </figure>
                <span>
                  <b>{{ supplierData.name }}</b>
                </span>
                <br />
                <span>{{ supplierData.address }}</span>
              </div>
            </div>
            <br />
            <h3>Nhà cung cấp tham gia liên kết</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import datetime from "vuejs-datetimepicker";
import moment from "moment";
Vue.prototype.moment = moment;

export default {
  components: {
    VueEditor,
    datetime
  },
  props: [
    "storeUrl",
    "supplier",
    "csrf",
    "allCoupon",
    "allType",
    "allCategory",
    "oldImages",
    "allError",
    "old"
  ],
  created() {
    this.supplierData = JSON.parse(this.supplier) || [];
    this.couponsData = JSON.parse(this.allCoupon) || [];
    this.typesData = JSON.parse(this.allType) || [];
    this.categoriesData = JSON.parse(this.allCategory) || [];
    this.imageData = JSON.parse(this.oldImages) || [];
    this.errors = JSON.parse(this.allError) || [];
    this.oldData = JSON.parse(this.old) || [];
  },
  data() {
    return {
      supplierData: [],
      couponsData: [],
      typesData: [],
      categoriesData: [],
      imageData: [],
      oldData: [],
      errors: [],
      content: null,
      url: null,
      subUrl: [],
      isAccept: true,
      isReview: false,
    };
  },
  methods: {
    addImage() {
        console.log(typeof(this.oldData.start_date));
      this.imageData = [
        ...this.imageData,
        {
          text: "",
          image: ""
        }
      ];
    },

    delImage(index) {
      this.imageData.splice(index, 1);
    },

    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
    onSubFileChange(e, index) {
      var subFile = e.target.files[0];
      this.subUrl[index] = URL.createObjectURL(subFile);
      this.$set(this.subUrl, index, URL.createObjectURL(subFile));
    }
  }
};
</script>

<style lang="scss" scoped>
.preview {
  display: flex;
  justify-content: center;
  align-items: center;
}

.preview img {
  max-width: 100%;
}

#event_thumbnail {
  width: 100%;
  height: auto;
}

img.logo {
  object-fit: cover;
  width: 180px;
  height: 180px;
  border-radius: 50%;
}
</style>
