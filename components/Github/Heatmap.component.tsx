import CalendarHeatmap from "react-calendar-heatmap";
import ReactTooltip from "react-tooltip";
const data = require("data/github_heatmap.json");



CalendarHeatmap.prototype.getHeight = function () {
  return (
    this.getWeekWidth() + (this.getMonthLabelSize() - this.props.gutterSize)
  );
};



function getGithubCommitCount(){
  let count = 0;
  const commits = data.map((date) => (count = count + date.count));
  console.log("commits", count);
  
  return count;
}


import styles from "./heatmap.module.css";

export default function Heatmap() {
  const today = new Date();

  return (
    <div className="relative w-full bg-base-200 p-4 rounded">
      <p className="mb-4 text-sm italic">
        {getGithubCommitCount()} commits in the last year.
      </p>
      <CalendarHeatmap
        startDate={shiftDate(today, -365)}
        endDate={today}
        values={data}
        classForValue={(value) => {
          if (!value) {
            return "color-empty";
          }
          return `color-github-${value.count}`;
        }}
        tooltipDataAttrs={(value) => {
          return {
            "data-tip": `${value.date?.slice(0, 10)} has count: ${value.count}`,
          };
        }}
        showWeekdayLabels={true}
        onClick={(value) => null}
      />
      <ReactTooltip className="bg-base-300 text-base-content" />
    </div>
  );
}

function shiftDate(date, numDays) {
  const newDate = new Date(date);
  newDate.setDate(newDate.getDate() + numDays);
  return newDate;
}

function getRange(count) {
  return Array.from({ length: count }, (_, i) => i);
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}