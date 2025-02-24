import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import {  glob ,  globSync ,  globStream ,  globStreamSync ,  Glob  } from 'glob';

var files = [];
files = files.concat(glob.sync('resources/js/**/*.@(js|svg)', {nodir: true}));
// console.log(files);
files = files.concat(glob.sync('resources/scss/**/*.@(css|scss)', {nodir: true}));
files = files.concat(glob.sync('resources/temple/**/*.@(svg)', {nodir: true}));


export default defineConfig({
    build: {
        // assetsDir: 'public/sample/v1/assets',
        // rollupOptions: {
        //     input: {
        //         main: resolve(__dirname, 'index.html'),
        //         view: resolve(__dirname, 'pages/view.html'),
        //         // auth
        //         reset: resolve(__dirname, 'pages/auth/reset/reset.html'),
        //         reset_new_password: resolve(__dirname, 'pages/auth/reset/new_password.html'),
        //         login: resolve(__dirname, 'pages/auth/modals/login.html'),
        //         signup: resolve(__dirname, 'pages/auth/modals/signup.html'),

        //         //
        //         categories: resolve(__dirname, 'pages/categories/index.html'),
        //         category: resolve(__dirname, 'pages/categories/category.html'),
        //         product: resolve(__dirname, 'pages/product.html'),

        //         // profile
        //         orders: resolve(__dirname, 'pages/profile/orders.html'),
        //         order: resolve(__dirname, 'pages/profile/order.html'),
        //         // about
        //         about: resolve(__dirname, 'pages/about.html'),

        //         // contacts
        //         contacts: resolve(__dirname, 'pages/contacts/index.html'),
        //         contact: resolve(__dirname, 'pages/contacts/contact.html'), //

        //         // companies
        //         companies: resolve(__dirname, 'pages/companies/index.html'), //
        //         company: resolve(__dirname, 'pages/companies/company.html'),

        //         // companies
        //         actions: resolve(__dirname, 'pages/actions/index.html'), //
        //         action: resolve(__dirname, 'pages/actions/action.html'),

        //         // feedback
        //         feedback: resolve(__dirname, 'pages/error/feedback.html'),
        //         404: resolve(__dirname, 'pages/error/404.html'),

        //         // email
        //         email_password: resolve(__dirname, 'pages/email/password.html'),

        //         // agreement
        //         agreement: resolve(__dirname, 'pages/agreement.html'),
        //     },
        // },
    },
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler', // or 'modern'
            },
        },
    },
    plugins: [
        laravel({
            input: files,
            refresh: true,
        }),
    ],
});
