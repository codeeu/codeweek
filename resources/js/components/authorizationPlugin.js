
// authorizationPlugin.js
const authorizationPlugin = {
    install(app) {
        app.config.globalProperties.$authorize = function(...params) {
            if (!window.App.signedIn) return false;

            if (typeof params[0] === 'string') {
                return authorizations[params[0]](params[1]);
            }

            return params[0](window.App.user);
        };
    }
};

export default authorizationPlugin;
