<template>
    <transition name="fade">

        <div
            ref="card"
            :loading="loading"
            :class="css"
        >
            <template v-if="loading">
                <div class="rounded-lg flex items-center justify-center absolute pin z-50">
                    <loader class="text-60" />
                </div>
            </template>

            <div ref="imageDiv" class="image-block flex justify-center w-full h-5/6">

            </div>

            <div class="missing p-8" v-if="missing">
                <p class="text-center leading-normal">
                    <a :href="file.name" class="text-primary dim" target="_blank">{{__('This image')}}</a> {{__('could not be found.')}}
                </p>
            </div>
        </div>
    </transition>
</template>

<script>
import { Minimum } from 'laravel-nova';
import { urlCDNResize } from '../settings';

export default {
    components: {
        //
    },

    props: {
        file: {
            type: Object,
            default: function() {
                return { name: '' };
            },
            required: true,
        },
        css: {
            type: String,
            default:
                'card relative w-2/3 flex flex-wrap justify-center items-center overflow-hidden px-0 py-0',
            required: false,
        },
    },

    data: () => ({
        loading: true,
        missing: false,
    }),

    mounted() {
        let newImage = new Image();
        console.log(this.file, this.file.image);
        newImage.src = urlCDNResize(this.file.image, 'width', 470);
        newImage.className = 'image block w-full self-center';
        newImage.draggable = false;
        this.$refs.imageDiv.appendChild(newImage);
        this.loading = false;
    },
};
</script>

<style scoped lang="scss">
.card {
    padding: 0 !important;
    box-shadow: none;
    border-radius: 0;
}

.h-5\/6 {
    height: 83.33333%;
}

.h-1\/6 {
    height: 16.66667%;
}

.image-block {
    max-height: 500px;

    .image {
        object-fit: contain;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
    }
}
</style>

<style lang="scss">
.svg-mime {
    width: 80px;
    height: 75%;
    fill: #62676d;
}

.image-block {
    .image {
        object-fit: contain;
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
    }
}
</style>
