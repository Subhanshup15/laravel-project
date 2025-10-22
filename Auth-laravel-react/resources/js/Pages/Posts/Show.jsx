import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Show({ auth, post }) {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={post.title} />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <div className="flex justify-between items-center mb-6">
                                <Link
                                    href={route('posts.index')}
                                    className="text-gray-600 hover:text-gray-900"
                                >
                                    ← Back to Posts
                                </Link>
                                {auth.user.id === post.user_id && (
                                    <Link
                                        href={route('posts.edit', post.id)}
                                        className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Edit Post
                                    </Link>
                                )}
                            </div>

                            <article>
                                <h1 className="text-3xl font-bold mb-4">{post.title}</h1>
                                
                                <div className="text-gray-600 mb-4">
                                    <span>By {post.user.name}</span>
                                    <span className="mx-2">•</span>
                                    <span>{new Date(post.created_at).toLocaleDateString()}</span>
                                    {post.published && (
                                        <>
                                            <span className="mx-2">•</span>
                                            <span className="text-green-600">Published</span>
                                        </>
                                    )}
                                </div>

                                <div className="prose max-w-none">
                                    <p className="text-gray-800 whitespace-pre-wrap">{post.content}</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}