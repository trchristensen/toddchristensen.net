import Link from 'next/link';

// import Analytics from 'components/metrics/Analytics';
// import Newsletter from 'components/metrics/Newsletter';
// import Container from 'components/Container';
// import GitHub from 'components/metrics/Github';
// import Gumroad from 'components/metrics/Gumroad';
// import Unsplash from 'components/metrics/Unsplash';
// import YouTube from 'components/metrics/Youtube';
import TopTracks from 'components/Spotify/TopTracks.component';
import Container from 'components/Container/Container.component';

export default function Dashboard() {
  return (
    <Container
      title="Dashboard – Todd Christensen"
      description="My personal dashboard, built with Next.js API routes deployed as serverless functions."
    >
      <div className="flex flex-col justify-center items-start max-w-2xl mx-auto mb-16">
        <h1 className="text-primary font-bold text-3xl md:text-5xl tracking-tight mb-4">
          Dashboard
        </h1>
        <div className="mb-8">

          <p className="mb-4">
            This is my personal dashboard, built with Next.js API routes
            deployed as serverless functions. I use this dashboard to track
            various metrics across platforms like Unsplash, YouTube, GitHub, and
            more. Want to build your own? Check out my&nbsp;
            <Link href="/blog/fetching-data-with-swr">
              <a className="underline">
                blog series.
              </a>
            </Link>
          </p>
        </div>
        {/* <div className="flex flex-col w-full">
          <Unsplash />
          <YouTube />
        </div>
        <div className="grid gap-4 grid-cols-1 sm:grid-cols-2 my-2 w-full">
          <Analytics />
          <GitHub />
        </div>
        <div className="grid gap-4 grid-cols-1 sm:grid-cols-2 my-2 w-full">
          <Gumroad />
          <Newsletter />
        </div> */}
        <h2 className="font-bold text-3xl tracking-tight mb-4 mt-16">
          Top Tracks
        </h2>
        <p className="mb-4">
          Curious what I, or most likely-- my fiancé, are currently jamming to?
          Here's my top tracks on Spotify updated daily.
        </p>
        <TopTracks />
      </div>
    </Container>
  );
}
