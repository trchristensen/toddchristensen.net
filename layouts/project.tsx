import Image from "next/image";
import { parseISO, format } from "date-fns";

import Container from "components/Container/Container.component";
// import Subscribe from "components/Subscribe";
import ViewCounter from "components/ViewCounter/ViewCounter.component";
import type { PropsWithChildren } from "react";
import type { Project } from ".contentlayer/types";

const editUrl = (slug) =>
  `https://github.com/trchristensen/toddchristensen.net/edit/main/data/blog/${slug}.mdx`;
const discussUrl = (slug) =>
  `https://mobile.twitter.com/search?q=${encodeURIComponent(
    `https://toddchristensen.net/blog/${slug}`
  )}`;

export default function ProjectLayout({
  children,
  post,
}: PropsWithChildren<{ post: Project }>) {
  return (
    <Container
      title={`${post.title} – Todd Christensen`}
      description={post.summary}
      image={`http://toddchristensen.net/assets/${post.image}`}
      date={new Date(post.publishedAt).toISOString()}
      type="article"
    >
      <article className="flex flex-col items-start justify-center w-full max-w-2xl mx-auto mb-16">
        <h1 className="mb-4 text-3xl font-bold tracking-tight text-primary">
          {post.title}
        </h1>
        <div className="flex flex-col items-start justify-between w-full mt-2 md:flex-row md:items-center">
          <div className="flex items-center">
            <Image
              alt="Todd Christensen"
              height={24}
              width={24}
              src="/avatar.jpg"
              className="rounded-full"
            />
            <p className="ml-2 text-sm">
              {"Todd Christensen / "}
              {format(parseISO(post.publishedAt), "MMMM dd, yyyy")}
            </p>
          </div>
          <p className="mt-2 text-sm min-w-32 md:mt-0">
            {post.readingTime.text}
            {` • `}
            <ViewCounter slug={post.slug} />
          </p>
        </div>
        <div className="w-full mt-4 prose dark:prose-dark max-w-none">
          {children}
        </div>
        <div className="mt-8">{/* <Subscribe /> */}</div>
        <div className="text-sm">
          <a
            href={discussUrl(post.slug)}
            target="_blank"
            rel="noopener noreferrer"
          >
            {"Discuss on Twitter"}
          </a>
          {` • `}
          <a
            href={editUrl(post.slug)}
            target="_blank"
            rel="noopener noreferrer"
          >
            {"Edit on GitHub"}
          </a>
        </div>
      </article>
    </Container>
  );
}
