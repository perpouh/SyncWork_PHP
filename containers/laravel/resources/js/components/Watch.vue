<template>
  <div class="watch">
    <span class="date">{{ formattedTime.date }}</span>
    <span class="time">{{ formattedTime.time }}</span>
  </div>
</template>

<script>
export default {
  name: "Watch",
  data() {
    return {
      now: new Date(),
      weekDays: ["日", "月", "火", "水", "木", "金", "土"],
      timer: null,
    };
  },
  computed: {
    formattedTime() {
      const y = this.now.getFullYear();
      const m = String(this.now.getMonth() + 1).padStart(2, "0");
      const d = String(this.now.getDate()).padStart(2, "0");
      const w = this.weekDays[this.now.getDay()];
      const hh = String(this.now.getHours()).padStart(2, "0");
      const mm = String(this.now.getMinutes()).padStart(2, "0");
      // 年月日部分と時間部分を別々に返す
      return {
        date: `${y}年${m}月${d}日(${w})`,
        time: `${hh}:${mm}`
      };
    },
  },
  mounted() {
    this.timer = setInterval(() => {
      this.now = new Date();
    }, 1000);
  },
  beforeUnmount() {
    clearInterval(this.timer);
  },
};
</script>

<style scoped>
.watch {
  font-size: 1.5rem;
  font-family: "Menlo", "Monaco", "Consolas", "Courier New", monospace;
  padding: 8px 16px;
  background: --color-background;
  color: --color-primary;
  border-radius: 8px;
  display: inline-block;
}
</style>
