import axios from "axios";

class Dashboard {

    constructor(wallRoute, dashboardParser) {
        this._wallRoute = wallRoute
        this._dashboardParser = dashboardParser;

        this.init()
    }

    get wallRoute() {
        return this._wallRoute
    }

    get dashboardParser() {
        return this._dashboardParser;
    }

    init() {
        this.initSelectors()
    }

    initSelectors() {
        this.wall = $(`#dashboard-wall`);
    }

    dashboardWall() {
        new axios.get(this.wallRoute)
            .then(function (callback) {
                this.addContentToWall(callback.data);
            }.bind(this))
            .catch(function (error) {
                // handle error
                console.log(error)
            })
    }

    addContentToWall(callback) {
        new axios.post(this.dashboardParser, { 'content': callback})
            .then(function (callback) {
                this.wall.empty()
                this.wall.html(callback.data.response)
            }.bind(this))
            .catch(function (error) {
                // handle error
                console.log(error)
            })
    }

}

window.Dashboard = Dashboard
